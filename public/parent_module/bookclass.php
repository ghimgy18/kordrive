<?php

include '../config.php'; // connect database
session_start(); // connect session to make sure its the right user that login, not different acc

if (!isset($_SESSION['email'])) { // if wrong email detected it will  open main page
    header("Location: ../index.php");
}
error_reporting(0); // to hide default error in input 
$resul = mysqli_query($conn, "SELECT * FROM instructor"); // query for instructor table
$child =  mysqli_query($conn, "SELECT childname FROM parent WHERE email = '$_SESSION[email]'"); // query for parent table

if (isset($_POST['submit'])) { // listen to submit button
    $row = mysqli_fetch_array($child); //get array of table data
    list($username, $instructoremail) = explode('|', $_POST['username']);
    // $username = $_POST['username'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    // $instructoremail = $_POST['email'];
    $childname = $row['childname'];
    $email = $_SESSION['email'];

    $status = 'Verifying';
    $sql = "SELECT * FROM booking WHERE date='$date'AND time='$time'AND instructoremail='$instructoremail'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        // store value to variable
        $sql = "INSERT INTO booking (instructorname, date, time,childname,email,instructoremail,status)
VALUES (' $username ', ' $date ', ' $time ', '$childname','$email','$instructoremail' ,'$status')"; // insert value into booking table
        $result = mysqli_query($conn, $sql); //  performs a query on a database.
        if ($result) { // check if right
            echo "<script>alert('Wow! success.')</script>";
            echo "<script>window.location = home.php</script>";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('The date and time You chosen have been booked.')</script>";
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
    <title>Parent Homepage</title>
    <style>
        .sidebar {

            color: black;
            top: 0;
            /* bottom: 0; */
            left: 0;
            z-index: 100;
            padding-left: 20px;
            box-shadow: inset -1px 0 0 rgb(0 0 0 / 10%);
            height: 100vh;
        }

        .sidebar .nav-link {
            font-weight: 300;
            color: #dbdbdb;
        }

        .nav-link {
            text-align: left;
            padding: 0.5rem 1rem;
            color: #0d6efd;
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }

        #edit {
            margin: 50px;
        }

        .btn {
            float: right;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Parent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                </ul>
                <a class="nav-link active" style="color:white" aria-current="page" href="../parent_module/home.php">Home</a>
                <a class="nav-link px-3" href="../logout.php">Sign out</a>
            </div>
        </div>
    </nav>

    <div class="row">


        <nav id="sidebarMenu" class="col-md-4 col-lg-2 d-md-block sidebar collapse" style="background-color: #3d3d3d;">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a onclick="gohomepage()" class="nav-link active" aria-current="page" href="#">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </span>
                            Home
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="goeditprofile()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Edit Profile
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="gobookclass()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Book Class
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="gobookstatus()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Booking Status
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="gopayment()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                            Payment
                        </a>
                    </li>
                    <hr>


                </ul>


            </div>
        </nav>

        <div id="edit" class="col-sm text-center">
            <h3 class="mb-2" style="text-align: start;">Book a Driving Class</h3>
            <p class="mb-7" style="text-align: start;">You may choose your driving instructor for your driving class. You may select the date and time for your classes.</p>

            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col card" style="width: 100px;">

                            <div= class="card-body">
                                <h5 style="text-align: start;">1. Choose your driving instructor:</h5>
                                <div class="mb-7">


                                    <?php
                                    if (mysqli_num_rows($resul) > 0) { // check if there is data
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($resul)) { // while loop to get all data 
                                    ?>

                                            <div style="padding-top: 10px;" class="form-check">
                                                <input value="<?php echo $row['username']; ?>|<?php echo $row['email']; ?> " class="form-check-input" type="radio" name="username" id="flexRadioDefault1" />
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <h6>Mr <?php echo $row['username']; ?> </h6>
                                                </label>
                                                <!-- <input  name="email" value="<?php echo $row['email']; ?>" /> -->
                                            </div>
                                    <?php




                                            $i++;
                                        }
                                    } else {
                                        echo "No result found"; // if no data
                                    }
                                    ?>

                                </div>


                                <div class="mb-7" style="display:flex; flex-direction: row; justify-content: start; align-items: start">
                                    <h5 style="text-align: start;">2. Select Date: </h5>

                                    <input style="border: 1px solid #c4c4c4;
                    border-radius: 2px;
                    background-color: #fff;
                    margin-left: 10px;
                    padding: 3px 5px;
                    box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                    width: 190px; " type="date" id="date" name="date" min="<?php echo date("Y-m-d"); ?>" required value="<?php echo $date; ?>">
                                    <div style="padding-left: 80px;"></div>


                                    <h5 style="text-align: start;">3. Select Time: </h5>

                                    <input type="time" id="appt" style=" border: 1px solid #c4c4c4;
                    border-radius: 2px;
                    background-color: #fff;
                    margin-left: 10px;
                    padding: 3px 5px;
                    box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                    width: 190px;" name="time" required value="<?php echo $time; ?>">

                                </div>
                                <button name="submit" type="submit" class="btn btn-primary" style="width: 150px; ">Book a Class</button>
                        </div>



                    </div>

            </div>

            </form>



        </div>
    </div>



    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>