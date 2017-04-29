<?php

/**
 * Session class
 */
class Session {
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }
    
    public static function delete($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    public static function destroy() {
        session_destroy();
    }
}
