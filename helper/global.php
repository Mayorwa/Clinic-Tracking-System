<?php
session_start();
function dd ($data) {
    var_dump($data);
    die();
}

function back () {
    return $_SERVER['HTTP_REFERER'];
}

function redirect($address) {
    header("Location: ".$address);
    exit;
}
