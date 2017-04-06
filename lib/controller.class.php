<?php

/**
 * Controller class is the parent
 * class of all controllers used in
 * web application.
 */
class Controller {
    protected $data;
    protected $model;
    protected $parameters;
    
    public function getData() {
        return $this->data;
    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function getParameters() {
        return $this->parameters;
    }
    
    public function __construct($data = array()) {
        $this->data = $data;
        $this->parameters = App::getRouter()->getParameters();
    }
}
