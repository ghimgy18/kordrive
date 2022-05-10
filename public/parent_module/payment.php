<?php
include '../config.php'; // connect database
session_start(); // connect session to make sure its the right user that login, not different acc

if (!isset($_SESSION['email'])) { // if wrong email detected it will  open main page
    header("Location: ../index.php");
}
// to hide default error in input

if (isset($_POST['submit'])) { // listen to submit button

    $name = $_POST['name'];
    $amount = $_POST['amount'];

    $method = $_POST['method'];


    // $sql = "SELECT * FROM parent WHERE username='$username'";
    // $result = mysqli_query($conn, $sql);



    // if (!$result->num_rows > 0) {
    $sql = "INSERT INTO payment (name,amount,method) 
    VALUES ('$name','$amount','$method')";
    $result = mysqli_query($conn, $sql);
    if ($result) {



        echo "<script>alert('Transaction Successfull.')</script>";
        echo "<meta http-equiv='refresh' content='1'>";



        $name = '';
        $amount = '';
        $method = '';
        // store value to variable
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
}
//}

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

        .form-outline {
            margin-left: 100px;
            margin-right: 100px;

        }
    </style>
</head>

<body>
    <header>
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



        </nav>
    </header>
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

        <div id="edit" class="col text-center">
            <h3 class="mb-2" style="text-align: start;">Payment</h3>
            <p class="mb-7" style="text-align: start;">You may fill the form below and proceed to the payment.</p>
            <form method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->


                <!-- Text input -->
                <div class="form-outline mb-4">
                    <input name="name" type="text" id="form6Example3" class="form-control" />
                    <label class="form-label" for="form6Example3">Name:</label>
                </div>



                <!-- Number input -->
                <div class="form-outline mb-4">
                    <input name="amount" type="number" id="form6Example6" class="form-control" />
                    <label class="form-label" for="form6Example6">Amount:</label>
                </div>

                <!-- Message input -->
                <h3>Payment Method</h3>
                <div class="form-outline mb-4">
                    <input name="method" class="form-check-input" type="radio" id="fpx" value="FPX" />
                    <label class="form-check-label" for="fpx">
                        <h6>FPX </h6>
                    </label>
                    <input name="method" class="form-check-input" type="radio" id="card" value="Card" />
                    <label class="form-check-label" for="card">
                        <h6>Debit/Credit Card</h6>
                    </label>
                </div>





                <div class="col" style="text-align: end;  padding-right: 100px;">
                    <button name="submit" type="submit" style="width: 100px;">Pay</button>
                </div>




                <!-- Submit button -->

            </form>

        </div>
    </div>


    <script src="../../js/mdb.min.js"></script>
    <script src="../parent_module/app.js"></script>
</body>

</html>