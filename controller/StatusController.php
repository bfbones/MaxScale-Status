<?php
// Default Controller for rendering status-site
//


class StatusController {

    private $request = null;
    private $template = '';

    public function __construct($request){
        $this->request = $request;
        $this->template = !empty($request['site']) ? $request['site'] : 'default';
    }

    /**
     * show overall server status
     *
     * @return String site data
     */
    public function indexAction() {
        $view = new View();
        $status = new Status();

        $server_data = $status->getServers();
        $view->setTemplate('default');
        $view->assign('servers', $server_data);

        return $view->loadTemplate();
    }
}