<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$database = "pcnpromopro_pcnhrs";

$con = mysqli_connect($localhost, $user, $pass, $database);
if(!$con){
    echo "Failed to connect";
    die();
}