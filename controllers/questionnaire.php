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
                $_SESSION['errors'] = [["info" => "<b>An error occurred</b>", "type" => "warning"]];
                return $_SESSION['errors'];
            }

            $_SESSION['errors'] = [["info" => "<b>Questionnaire created successfully</b>", "type" => "success"]];
            return $result;

        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return $_SESSION['errors'];
        }
    }

    public function get_all_questionnaires(){
        try{
            $results = $this->question->fetchAll();

            return $results;
        }catch (PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return [];
        }
    }

    public function delete_questionnaire($id){
        try{
            $result = $this->question->delete($id);
            if ($result){
                $_SESSION['errors'] = [["info" => "<b>Questionnaire deleted successfully</b>", "type" => "success"]];
                return [];
            }
            else{
                $_SESSION['errors'] = [["info" => "<b>An Error Occurred</b>", "type" => "danger"]];
                return [];
            }
        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return [];
        }
    }

    public function get_one_questionnaire($id){
        try{
            $result = $this->question->fetchOne($id);
            if ($result == null){
                $_SESSION['errors'] = [["info" => "<b>An Error Occurred</b>", "type" => "danger"]];
                return null;
            }

            return $result;
        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return null;
        }
    }

    public function update_questionnaire($id, $data){
        try{
            $result = $this->question->update($id, $data);
            if ($result){
                $_SESSION['errors'] = [["info" => "<b>Questionnaire updated successfully</b>", "type" => "success"]];
                return [];
            }
            else{
                $_SESSION['errors'] = [["info" => "<b>An Error Occurred</b>", "type" => "danger"]];
                return [];
            }
        }
        catch(PDOException $e){
            $_SESSION['errors'] = [["info" => "<b>Error Occurred:". $e->getMessage()."</b>", "type" => "danger"]];
            return null;
        }
    }
}