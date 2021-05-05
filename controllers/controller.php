<?php
class Controller

{

    protected function model($model)
    {
        require_once('../app/models/' . $model . '.php');
        return new $model();
    }

    protected function view($view, $data = [])
    {
        $data = $this->session_flashes();
        try {
            require_once("../app/views/" . $view . '.php');
        }catch (Exception $e) {
            echo $e->getMessage() . " Seyi Daniels";
            die();
        }
    }

    protected function session_flashes () {
        $data = [];
        if (isset($_SESSION['validation_errors'])) {
            $data['validation_errors'] = $_SESSION['validation_errors'];
            unset($_SESSION['validation_errors']);
        }else if (isset($_SESSION['error'])) {
            $data['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }else if (isset($_SESSION['message'])) {
            $data['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        return $data;
    }

    protected function validates($data, array $fields) {
        $_SESSION['validation_errors'] = null;
        $validation_errors = [];
        foreach($fields as $field) {
            if (!array_key_exists($field, $data)) {
                array_push($validation_errors, $field . " is required");
            }
        }
        $_SESSION['validation_errors'] = !empty($validation_errors) ? $validation_errors : null;
        if($validation_errors) {
            return redirect(back());
            die();
        }
    }


}