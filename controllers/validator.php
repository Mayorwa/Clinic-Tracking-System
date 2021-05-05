<?php
class Validator{

    private $isError;
    private $errors;
    public function __construct(){
        $this->isError = false;
        $this->errors = [];
    }

    public function validateInput($data, $required){
        foreach($required as $input){
            if ($data[$input] == ''){
                $this->isError = true;
                array_push($this->errors, ["info" => "<b>".$input." is required</b>", "type" => "danger"]);
            }
        }
        return $this;
    }

    public function fails(){
        return $this->isError;
    }

    public function errors(){
        return $this->errors;
    }
}