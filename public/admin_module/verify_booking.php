<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
$resul = mysqli_query($conn, "SELECT * FROM booking;");

if (isset($_POST['submit'])) {

    $status = $_POST['status'];
    $comment = $_POST['comment'];
    $username = $_POST['username'];


    $sql = "SELECT * FROM booking WHERE childname='$childname'";
    $result = mysqli_query($conn, $sql);



    if (!$result->num_rows > 0) {
        $sql = "UPDATE instructor  SET status='$_POST[status]', comment= '$comment' WHERE childname='$_SESSION[childname]'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Wow! User Registration Completed.')</script>";
            echo "<meta http-equiv='refresh' content='1'>";



            $phonenumber = $row['phonenumber'];
            $childname = $row['childname'];
            $address = $row['address'];
            $password = md5($row['password']);
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Some value are same as the old one.')</script>";
    }
}


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
                    <div style="padding-top: 5%; padding-left: 200px;">
                        <h1 style="text-align: center;">Verify Booking</h1>

                    </div>
                    <div style="padding-left: 100px;">
                        <table style="width: 700px;" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Save</th>

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
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['time'] ?></td>
                                            <td>

                                                <input type="text" id="appt" name="status" required value="<?php echo $row['status']; ?>">

                                            </td>
                                            <td>

                                                <input type="text" id="appt" name="comment" required value="<?php echo $row['comment']; ?>">

                                            </td>
                                            <td>

                                                <button name="submit" type="submit" class="btn btn-primary btn-block ">Update</button>

                                            </td>

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