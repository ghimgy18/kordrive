<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
// $email = 'ghuf.yoo@gmail.com';
// $sql = "SELECT * FROM parent;";
// $q = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($q);
// if ($resultCheck > 0) {
//     while ($row = mysqli_fetch_assoc($q)) {
//         echo $row['firstname'];
//         echo $row['email'];
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <title>Admin Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div style="padding-left: 50px;" class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <div class="mx-auto order-0 ">
                        <a class="navbar-brand mx-auto" href="#">
                            <h1>Admin</h1>
                        </a>

                </li>
            </ul>
        </div>

        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="./home.php" class="nav-link">Homepage</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php
                    " class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <table class="table">
        <thead class="black white-text">
            <tr>



                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <th style="width: 200px;">

                    <div style="padding-bottom: 25px;">
                        <button onclick="goviewinstructor()" style="height: 100px; width: 200px;">
                            View Instructor
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="goverifybooking()" style="height: 100px; width: 200px;">
                            Verify Booking
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="goviewparent()" style="height: 100px; width: 200px; ">
                            View Parent
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gomanagepayment()" style="height: 100px; width: 200px; ">
                            Manage payment
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="goinstructorscheduler()" style="height: 100px; width: 200px; ">
                            Instructor schedule
                        </button>
                    </div>
                </th>

                <td>
                    <div style="padding-top: 20%; padding-left: 400px;">
                        <?php echo "<h1 >Welcome " . $_SESSION['username'] . " Homepage</h1>"; ?>


                    </div>
                </td>

            </tr>





        </tbody>
    </table>



    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>