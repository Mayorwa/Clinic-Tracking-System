<?php
require_once('../models/user.php');
require_once('validator.php');

class Auth{

    private $validator;
    private $user;
    public function __construct(){
        $this->validator = new Validator();
        $this->user = new User();
    }

    public function login($data){
        try{
            $validation = $this->validator->validateInput($data, ["email", "password"]);
            if($validation->fails()){
                $_SESSION['errors'] = $validation->errors();
                return $_SESSION['errors'];
            }

            $result = $this->user->get_user_for_login($data["email"], $data["password"]);

            if(!$result){
                $_SESSION['errors'] = [["info" => "<b>incorrect email or password</b>", "type" => "warning"]];
                return $_SESSION['errors'];
            }
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user'] = $result;
            $_SESSION['errors'] = [["info" => "<b>user logged in successfully</b>", "type" => "success"]];
            return $result;

        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "warning"]];
            return $_SESSION['errors'];
        }
    }

    public function logout(){
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['user']);
        $_SESSION['errors'] = [["info" => "<b>logout successful</b>", "type" => "success"]];
        redirect('../auth/sign-in.php');
    }
}