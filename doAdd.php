<?php

header("Content-Type:text/html;charset=utf-8");

$userName = $_POST["userName"];
$time = $_POST["time"];
$noteVal = $_POST["noteVal"];

$arr = ["userName"=>$userName,"time"=>$time,"noteVal"=>$noteVal];

$str = json_encode($arr);

$num = file_put_contents("note.txt", $str."[;]",FILE_APPEND);

if($num>0){
    echo "true";
}else{
    echo "false";
}
