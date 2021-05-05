<?php

require '../controllers/validator.php';
class Validate{

    private $validator;
    public function __construct(Validator $validator){
        $this->validator = $validator;
    }

    public function login($data){
        return ;
    }
}