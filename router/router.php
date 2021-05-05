<?php

class Router{

    private $request;

    public function __construct($request){
        $this->request = $request;
        
    }

    public function get($route, $file, $authCheck=false){
        $uri = trim( $this->request, "/" );
        $uri = explode("/", $uri);
        array_shift($uri);
        $uri = implode("",$uri);
        $uri = explode("?", $uri);
        if(!isset($uri[0])){
            $uri[0] = '';
        }
        dd($authCheck);
        if($uri[0] == trim($route, "/")){
            $_SESSION['isFound'] = true;
            dd($authCheck);
            // if($authCheck){
            //     if(!$_SESSION['isLoggedIn']){
            //         return header("Location: login.php");
            //     }
            // }else{
            //     return require_once $file.'.php';
            // }

        }

    }

    public function fourOhfour(){
        require_once 'pages/404.php';
    }

}