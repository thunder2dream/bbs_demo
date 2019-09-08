<?php
header("Content-Type:text/html;charset=utf-8");



$str = $_POST["formData"]."[;]";

$num = file_put_contents("user.txt", $str,FILE_APPEND);

if($num>0){
    echo "true";
}else{
    echo "false";
}