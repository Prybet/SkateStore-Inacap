<?php


class PDOConnection {
    
    private $dsn = "mysql:host=localhost;dbname=skatestoredb";
    private $username = "root";
    private $password = "root";
    public $mysql = null;
    
    function __construct() {
        try {
            $this->mysql = new PDO($this->dsn, $this->username, $this->password);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
       
}



