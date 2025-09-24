<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "heaven";


$conn = new mysqli($host, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " );
}
else{
    echo"connection successfull";
}
?>