<?php

$host = "localhost";
$user = "root";
$pass = "aDMIN@123";
$db = "eventdb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


?>