<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
$resul = mysqli_query($conn, "SELECT * FROM booking WHERE email = '$_SESSION[email]' ");






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <title>Parent Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <div class="mx-auto order-0 ">
                        <a class="navbar-brand mx-auto" href="#">Parent</a>

                </li>
            </ul>
        </div>

        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="/pages/parent_module/home.html" class="nav-link">Homepage</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php
                    " class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <table class="table">
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
                        <button onclick="gobookclass()" style="height: 100px; width: 200px;">
                            Book class
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gobookstatus()" style="height: 100px; width: 200px;">
                            Booking Status
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gopayment()" style="height: 100px; width: 200px; ">
                            Payment
                        </button>
                    </div>
                </th>

                <td>
                    <h1 style="padding-left: 105px; text-align: center;">Booking Status</h1>
                    <div style="padding-left: 100px;">
                        <table style="width: 1000px;" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Children</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
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
                                            <td><?php echo $row['time'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
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