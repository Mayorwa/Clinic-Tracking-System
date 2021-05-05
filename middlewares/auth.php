<?php
    require_once('../helper/global.php');
    function must_not_be_auth(){
        if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
            redirect('../board/overview.php');
        }
    }
    function must_be_auth(){
        if(!isset($_SESSION['isLoggedIn'])){
            $_SESSION['errors'] = [["info" => "<b>User must be logged in</b>", "type" => "warning"]];
            redirect('../auth/sign-in.php');
        }
    }