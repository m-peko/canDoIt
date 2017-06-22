<?php

/**
 * ControllerFactory is used to
 * create controller object.
 */
class ControllerFactory {
    public static function makeController($className, $parameters = array()) {
        $controllerObject = null;
        
        switch($className) {
            case 'RegistrationController':
                $controllerObject = new RegistrationController($parameters);
                break;
            case 'LoginController':
                $controllerObject = new LoginController($parameters);
                break;
            case 'TasksController':
                $controllerObject = new TasksController($parameters);
                break;
            default:
                break;
        }
        
        return $controllerObject;
    }
}
