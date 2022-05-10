<?php
include '../config.php';
session_start();

$id = $_GET['id'];
mysqli_query($conn, "delete from `booking` where id='$id'");
?>
<meta http-equiv="refresh" content="1">

<?php echo "<script>alert('Successful')</script>"; header('location:instructor_scheduler.php');
