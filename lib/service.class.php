<?php

/**
 * Service class is the parent
 * class of all services used in
 * web application.
 */
class Service {
    protected $database;
    
    public function __construct() {
        $this->database = Database::getInstance();
    }
}
