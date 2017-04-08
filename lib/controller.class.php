<?php

/**
 * Controller class is the parent
 * class of all controllers used in
 * web application.
 */
class Controller {
    protected $data;
    protected $service;
    protected $parameters;
    
    public function getData() {
        return $this->data;
    }
    
    public function getService() {
        return $this->service;
    }
    
    public function getParameters() {
        return $this->parameters;
    }
    
    public function __construct($data = array()) {
        $this->data = $data;
        $this->parameters = App::getRouter()->getParameters();
    }
}
