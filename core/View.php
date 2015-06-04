<?php
// class for rendering template
//

class View {

    // path to template and standart-template
    private $path = 'templates';
    private $template = 'default';

    private $_ = array();

    /**
     * add a key to the correct value
     *
     * @param String $key Key to find
     * @param String $value it's value
     */
    public function assign($key, $value){
        $this->_[$key] = $value;
    }

    /**
     * set name of template
     *
     * @param String $template Name of template
     */
    public function setTemplate($template = 'default'){
        $this->template = $template;
    }

    /**
     * load template and return
     *
     * @param string $tpl Name of template
     * @return string Return of template
     */
    public function loadTemplate(){
        $tpl = $this->template;
        // get file path and check if exists
        $file = $this->path . DIRECTORY_SEPARATOR . $tpl . '.php';

        if (file_exists($file)){
            // render template
            ob_start();
            include($file);
            $output = ob_get_contents();
            ob_end_clean();


            return $output;
        }
        else {
            die('could not find template');
        }
    }
}
