<?php
require_once('Database.php');
class User {

    private $database;
    public function __construct(){
        $this->database = new Database();
    }

    public function get_user_for_login($email, $password){
        $this->database->query('SELECT * FROM users WHERE email = :email AND password = :password');
        $this->database->bind(':email', $email);
        $this->database->bind(':password', $password);
        $rows = $this->database->fetch();

        return $rows;
    }
}