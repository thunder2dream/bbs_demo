<?php

header("Content-Type:text/html;charset=utf-8");

$str = $_POST["formData"];

list($userName) = explode("&", $str);
list(,$pwd) = explode("&", $str);

$users = file_get_contents("user.txt");

$userArr = explode("[;]", $users);

foreach ($userArr as $user) {
    list($realName) = explode("&", $user);
    list(,$realPwd) = explode("&", $user);
    if($userName==$realName&&$pwd==$realPwd){
        echo "true";
        die();
    }
}

echo "false";
