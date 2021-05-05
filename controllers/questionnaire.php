<?php
require_once('../models/question.php');
require_once('validator.php');

class Questionnaire{

    private $validator;
    private $question;
    public function __construct(){
        $this->validator = new Validator();
        $this->question = new question();
    }

    public function add_questionnaire($data){
        try{
            $validation = $this->validator->validateInput($data, ["title", "questions"]);
            if($validation->fails()){
                $_SESSION['errors'] = $validation->errors();
                return $_SESSION['errors'];
            }

            $result = $this->question->create($data);

            if(!$result){
                $_SESSION['errors'] = [["info" => "<b>incorrect email or password</b>", "type" => "warning"]];
                return $_SESSION['errors'];
            }
            $_SESSION['errors'] = [["info" => "<b>user logged in successfully</b>", "type" => "success"]];
            return $result;

        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return $_SESSION['errors'];
        }
    }
}