<?php
include '../config.php';
session_start();

$id = $_GET['id'];
mysqli_query($conn, "delete from `parent` where id='$id'");
?>
<meta http-equiv="refresh" content="1">
<?php header('location:view_parent.php');
// if (!isset($_GET['Del'])) {
//     $Username = $_GET['Del'];
//     $query = "DELETE FROM parent WHERE username = '" . $Username . "'";
//     $result = mysqli_query($conn, $query);

//     if ($result) {
//         header("location:view_parent.php");
//     } else {
//         echo 'Failed tp delete';
//     }
// } else {
//     header("location:view_parent.php");
// }
