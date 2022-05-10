<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
$resul = mysqli_query($conn, "SELECT * FROM instructor;");




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <link rel="stylesheet" href="../../styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Admin Homepage</title>
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

        #container {
            text-align: end;

        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../admin_module/home.php"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"></a></li>
                                <li><a class="dropdown-item" href="#"></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"></a></li>
                            </ul> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled"></a>
                        </li>
                    </ul>
                    <a class="nav-link active" style="color:white" aria-current="page" href="../admin_module/home.php">Home</a>
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
                        <a onclick="goviewinstructor()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            View Instructor
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="goverifybooking()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Verify Booking
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="goviewparent()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            View Parent
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="gomanagepayment()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Manage Payment
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a onclick="goinstructorscheduler()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                            Instructor Schedule
                        </a>
                    </li>
                    <hr>


                </ul>


            </div>
        </nav>

        <div id="edit" class="col text-center">
            <h3 class="mb-2" style="text-align: start;">View Instructor</h3>



            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-dark" style="font-weight: bold; color:white;">
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Delete</th>

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

                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['phonenumber'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td>


                                    <a href="deleteinstructor.php?id=<?php echo $row['id'] ?>">Delete</a>



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


            <div id="container">
                <button type="submit" class="btn btn-primary" style="width: 200px;" onclick="location.href='./add_instructor.php'">Add Instructor</button>
            </div>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->

    </div>




    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>