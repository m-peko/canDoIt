<?php

/**
 * Model class is the parent
 * class of all models used in
 * web application.
 */
class Model {
    protected $database;
    
    public function __construct() {
        $this->database = Database::getInstance();
    }
}
