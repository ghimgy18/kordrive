<?php
// credentials that needed to connect to database
$server = "localhost";
$user = "root";
$pass = "";
$database = "DrivingSchool";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
