<?php

/**
 * Config class is used to store global
 * settings of web application such as
 * name of application, database information etc.
 */
class Config {
    protected static $settings = array();
    
    public static function get($key) {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }
    
    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }
}

