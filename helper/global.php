<?php
session_start();
function dd ($data) {
    var_dump($data);
    die();
}

function redirect($address) {
    header("Location: ".$address);
    exit;
}
