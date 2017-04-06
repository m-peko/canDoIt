<?php

/**
 * Database class is responsible for
 * establishing connection to database
 * and executing database queries. It is
 * implemented using singleton pattern. 
 */
class Database {
    private static $instance;
    private $connection;
    
    public static function getInstance() {
        if(self::$instance == NULL) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->connection = mysqli_connect(Config::get('dbHost'), Config::get('dbUser'),
                                           Config::get('dbPassword'), Config::get('dbName'));
        
        if(mysqli_connect_error()) {
            throw new Exception('Could not connect to database');
        }
    }
    
    public function query($sql) {
        if(!$this->connection) {
            return false;
        }
        
        $result = mysqli_query($this->connection, $sql);
        if(mysqli_error($this->connection)) {
            throw new Exception(mysqli_error($this->connection));
        }
        
        if(is_bool($result)) {
            return $result;
        }
        
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function escape($str) {
        return mysqli_escape_string($this->connection, $str);
    }
}
