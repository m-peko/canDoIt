<?php

/**
 * App class is the main part of web
 * application. It contains routing logic
 * (processes uri, creates controllers and
 * calls render methods).
 */
class App {
    protected static $router;
    
    public static $database;
    
    public static function getRouter() {
        return self::$router;
    }
    
    public static function run($uri) {
        self::$router = new Router($uri);
        
        //self::$database = Database::getInstance();
        
        $controllerClass = ucfirst(self::$router->getController()).'Controller';
        $controllerMethod = strtolower(self::$router->getAction());
        
        // Calling controller's method
        $controllerObject = new $controllerClass();
        if(method_exists($controllerObject, $controllerMethod)) {
            // Controller's action may return a view path
            $viewPath = $controllerObject->$controllerMethod();
            $viewObject = new View($controllerObject->getData(), $viewPath);
            $content = $viewObject->render();
        }
        else {
            throw new Exception('Method '.$controllerMethod.' of class '.$controllerClass.' does not exist.');
        }
        
        $layoutPath = VIEWS_PATH.DS.'main.html';
        $layoutViewObject = new View(compact('content'), $layoutPath);
        echo $layoutViewObject->render();
    }
}

