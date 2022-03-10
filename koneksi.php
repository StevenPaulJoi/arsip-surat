<?php
$host = "localhost";
$user = "army";
$pass = "ahmadsopian050101";
$db = "db_surat";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Connection Error : ".mysqli_connect_error());
}

function cek($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

?>           