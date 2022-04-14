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
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">
                    <h1>Admin</h1>



                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="col">
                    <a href="/pages/admin_module/home.html">Homepage</a>

                </th>
                <th scope="col">
                    <a href="/index.html">Logout</a>

                </th>
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
                        <?php echo "<h1 >Welcome " . $_SESSION['username'] . "</h1>"; ?>
                        <h1 style="text-align: center;">Homepage</h1>

                    </div>
                </td>

            </tr>





        </tbody>
    </table>



    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>