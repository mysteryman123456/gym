<?php
$servername = "localhost";
$username = "gym";
$password = "helloworld";
$dbname = "gym";

$connection = new mysqli($servername ,$username,$password,$dbname);

if ($connection->connect_error){
    die("Could not connect to database, Please check connection and credentials");
}
?>