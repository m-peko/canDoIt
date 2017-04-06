<?php

/**
 * View class is used to render
 * the layout, inject data to layout etc.
 */
class View {
    protected $data;
    protected $path;
    
    protected static function getDefaultViewPath() {
        $router = App::getRouter();
        if(!$router) {
            return false;
        }
        $controllerDirectory = $router->getController();
        $template = $router->getAction().'.html';
        
        return VIEWS_PATH.DS.$controllerDirectory.DS.$template;
    }

    public function __construct($data = array(), $path = null) {
        if(!$path) {
            $path = self::getDefaultViewPath();
        }
        
        if(!file_exists($path)) {
            throw new Exception('Template file is not found in path: '.$path);
        }
        
        $this->data = $data;
        $this->path = $path;
    }
    
    public function render() {
        $data = $this->data;
        
        // Turn on output buffering
        ob_start();
        include($this->path);
        $content = ob_get_clean(); // Get current buffer contents and delete current output buffer
        
        return $content;
    }
}
