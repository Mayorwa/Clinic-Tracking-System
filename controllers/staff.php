<?php
require 'Database.php';

class Staff{

    private $database;

    public function __construct(){
        $this->database = new Database($host, $db, $username, $password);
    }
    
}