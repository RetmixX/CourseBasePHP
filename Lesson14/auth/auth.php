<?php
function auth($login, $password){
    $abstractDB = require __DIR__ . '/DB.php';
    foreach ($abstractDB as $item)
        if ($item["login"]==$login&& $item["password"]==$password) return true;

    return false;
}

function getLogin(){
    $login = array_key_exists("login", $_COOKIE)? $_COOKIE["login"]:"";
    $password = array_key_exists("password", $_COOKIE)? $_COOKIE["password"]:"";

    if (auth($login, $password)) return $login;

    return null;
}
