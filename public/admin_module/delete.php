<?php
include '../config.php';
session_start();

if (!isset($_GET['Del'])) {
    $Username = $_GET['Del'];
    $query = "DELETE FROM parent WHERE username = '" . $Username . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:view_parent.php");
    } else {
        echo 'Failed tp delete';
    }
} else {
    header("location:view_parent.php");
}
