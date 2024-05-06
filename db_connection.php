<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "indoorfarming";
$con = new mysqli($server, $user, $pass, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
