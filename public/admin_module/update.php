<?php
include '../config.php';
session_start();
$id = $_GET['id'];

$comment = $_POST['comment'];
$status = $_POST['status'];

mysqli_query($conn, "update `booking` set status='$status', comment='$comment' where id='$id'");
echo "<script>alert('Successful')</script>";
header('location:verify_booking.php');
