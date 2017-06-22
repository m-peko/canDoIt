<?php

/**
 * Router class is used for processing Uri, i.e.
 * extracting controller, action and parameters
 * from the given Uri.
 */
class Router {
    protected $uri;
    protected $controller;
    protected $action;
    protected $parameters;
    protected $route;
    
    public function getUri() {
        return $this->uri;
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getParameters() {
        return $this->parameters;
    }
    
    public function getRoute() {
        return $this->route;
    }
    
    public function __construct($uri) {
        $this->uri = urldecode(trim($uri, '/'));

        // Get defaults
        $routes = Config::get('routes');
        $this->route = Config::get('defaultRoute');
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');
        
        // Divide uri to path part and query string part
        $uriParts = explode('?', $this->uri);
        
        $path = $uriParts[0];
        
        $pathParts = explode('/', $path);
        
        // Get route
        if(in_array(strtolower(current($pathParts)), array_keys($routes))) {
            $this->route = strtolower(current($pathParts));
            $this->controller = $routes[$this->route];
            array_shift($pathParts);
        }
        
        // Get controller
        if(current($pathParts)) {
            $this->controller = strtolower(current($pathParts));
            array_shift($pathParts);
        }

        // Get action
        if(current($pathParts)) {
            $this->action = strtolower(current($pathParts));
            array_shift($pathParts);
        }

        // Get parameters
        $this->parameters = $pathParts;
    }
    
    public function redirect($location) {
        header("Location: $location");
    }
}
