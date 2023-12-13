<?php
$localhost = "localhost";
$user = "pcnadmin";
$pass = "@Pcn123456789#";
$database = "pcnpromopro_pcnhrs";

$con = mysqli_connect($localhost, $user, $pass, $database);
if(!$con){
    echo "Failed to connect";
    die();
}