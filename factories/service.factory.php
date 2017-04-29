<?php

/**
 * ServiceFactory is used to
 * create service object.
 */
class ServiceFactory {
    public static function makeService($className, $parameters = array()) {
        $serviceObject = null;
        
        switch($className) {
            case 'UserService':
                $serviceObject = new UserService($parameters);
                break;
            default:
                break;
        }
        
        return $serviceObject;
    }
}
