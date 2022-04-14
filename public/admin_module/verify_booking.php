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
    $username = $_POST['usernam'];


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
                <th scope="col">




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
                    <div style="padding-top: 5%; padding-left: 20px;">
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
                                                <select name="status" id="status" class="status">
                                                    <option value="accept">Accept</option>
                                                    <option value="decline">Decline</option>

                                                </select>



                                            </td>
                                            <td>

                                                <input type="text" id="comment" name="comment" required value="<?php echo $row['comment']; ?>">

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


    <script>
        const activities = document.getElementById("status");

        // activities.addEventListener("click", function() {
        //     var options = activities.querySelectorAll("option");
        //     var count = options.length;
        //     if(typeof(count) === "undefined" || count < 2)
        //     {
        //         addActivityItem();
        //     }
        // });

        activities.addEventListener("click", function() {

            if (activities.value == "accept") {
                document.getElementById("comment").disabled = true;
                //document.getElementById("comment").hidden = true
                //addActivityItem();
            } else {

                document.getElementById("comment").disabled = false;
            }

        });


        function addActivityItem() {
            // ... Code to add item here
        }
        // $(function() {
        //     $('#status').on('change', function(event) {
        //         if ($(this).val() === 'accept') {
        //             $('#appt').val("");
        //             $('#appt').attr('readonly', true);
        //         } else if ($(this).val() === 'decline') {
        //             $('#appt').attr('readonly', false);
        //         }
        //         // $(this).prev('input').val($(this).val());
        //     });
        // });
    </script>

</body>

</html>