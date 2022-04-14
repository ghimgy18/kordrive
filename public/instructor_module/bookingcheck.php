<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
// $getusername = mysqli_query($conn, "SELECT * FROM instructor WHERE email = '" . ($_SESSION['email']) . "'");
// $ro = mysqli_fetch_array($getusername);
// $username = $ro['username'];



$resul = mysqli_query($conn, "SELECT * FROM booking WHERE instructoremail = '$_SESSION[email]'");






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <title>Instructor Homepage</title>
</head>

<body>
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">
                    <h1>Instructor</h1>



                </th>
                <th></th>


                <th scope="col">
                    <a href="/pages/instructor_module/home.html">Homepage</a>

                </th>
                <th scope="col">
                    <a href="../logout.php">Logout</a>

                </th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th style="width: 200px;">
                    <div style="padding-bottom: 25px;">
                        <button onclick="gohomepage()" style="height: 100px; width: 200px; ">
                            Homepage
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="goeditprofile()" style="height: 100px; width: 200px;">
                            Edit Profile
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gocheckbooking()" style="height: 100px; width: 200px;">
                            Check Booking
                        </button>
                    </div>
                </th>

                <td>
                    <h1 style="padding-left: 105px; text-align: center;">Booking Status</h1>
                    <div style="padding-left: 100px;">
                        <table style="width: 1000px;" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($resul) > 0) {
                                ?>
                                    <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($resul)) {
                                    ?>
                                        <tr>

                                            <td><?php echo $row['childname'] ?></td>
                                            <td>12-Jun-22</td>
                                            <td>2pm</td>

                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                <?php
                                } else {
                                    echo "No result found";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </td>

            </tr>





        </tbody>
    </table>



    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>