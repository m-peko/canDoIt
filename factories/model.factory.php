<?php

/**
 * ModelFactory is used to
 * create model object.
 */
class ModelFactory {
    public static function makeModel($className, $parameters = array()) {
        $modelObject = null;
        
        switch($className) {
            case 'UserModel':
                $modelObject = new UserModel($parameters[0], $parameters[1], $parameters[2],
                                             $parameters[3], $parameters[4]);
                break;
            default:
                break;
        }
        
        return $modelObject;
    }
}
