<?php
// credentials that needed to connect to database
$server = "localhost";
$user = "root";
$pass = "";
$database = "drivingschool";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
