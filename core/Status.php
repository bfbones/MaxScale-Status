<?php
// class for getting status from maxscale by telnet
//

require_once("lib/TelnetClient.php/TelnetClient.php");
(@include_once 'config.php') or die("config.php not found!");

use TelnetClient\TelnetClient;

class Status {
    private $con;

    /**
     * try to connect to maxscale and login
     */
    function __construct() {
        try {
            $this->con = new TelnetClient(HOST, PORT, 10.0, 10.0);
            $this->con->connect();
        } catch(Exception $e) {
            die('unable to connect: '.$e);
        }

        try {
            $this->con->setPrompt('MaxScale>');
            $this->con->login(USERNAME, PASSWORD, 'MaxScale login:');
        } catch(Exception $e) {
            die('unable to login: '.$e);
        }
    }

    /**
     * get all servers and it's status
     *
     * @return array
     */
    public function getServers() {
        $result = $this->con->exec('list servers');

        // check if we got what we want
        if($result[0] == 'Servers.') {
            $data = array();
            // start at line 4, because everything before is just table-header and stuff and stop a little bit earlier
            for($i = 4; $i <= (sizeof($result)-3); $i++) {
                $parse_line = preg_split('/\W+\|\W+/', $result[$i]);
                $data[] = array('name' => $parse_line[0], 'address' => $parse_line[1], 'port' => $parse_line[2],
                    'connections' => $parse_line[3], 'status' => $parse_line[4]);
            }

            return $data;
        } else {
            die('unable to get server-data. Result was: '.var_dump($result));
        }
    }
}