<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
$USERNAME;
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];


    $password = md5($_POST['password']);


    $sql = "SELECT * FROM instructor WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    // check individual input whether same or not
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] == $username && $row['phonenumber'] == $phonenumber && $row['password'] == $password) {

        // echo $username . ' ' .$phonenumber . ' ' . $password;
        echo "<script>alert('Woops! Some value are same as the old one.')</script>";
    } elseif ($result->num_rows > 0) {
        $sql = "UPDATE instructor  SET username='$username', phonenumber= '$phonenumber',password = '$password' WHERE email='$_SESSION[email]'";

        // echo 'masuk';

        $result1 = mysqli_query($conn, $sql);
        if ($result1) {
            echo "<script>alert('Wow! You have updated your profile.')</script>";
            echo "<meta http-equiv='refresh' content='1'>";

            $row = mysqli_fetch_assoc($result1);
            $_SESSION['username'] = $row['username'];






            $phonenumber = $row['phonenumber'];
            $password = $row['password'];
            // echo "<script>alert('Wow! User Registration Completed.')</script>";
            // echo "<script>window.location = view_parent.php</script>";

        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }
    //else {
    //     echo "<script>alert('Woops! Some value are same as the old one.')</script>";
    // }
}
$resul = mysqli_query($conn, "SELECT * FROM instructor WHERE email = '$_SESSION[email]'");
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
            padding-right: 100px;
        }

        .btn {
            display: inline-block;

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
                <a class="navbar-brand" href="#">Instructor</a>
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
                    <a class="nav-link active" style="color:white" aria-current="page" href="../instructor_module/home.php">Home</a>
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
                        <a onclick="gocheckbooking()" class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Check Booking
                        </a>
                    </li>
                    <hr>



                </ul>


            </div>
        </nav>


        <div id="edit" class="col text-center">
            <h3 class="mb-2" style="text-align: start;">Edit Profile</h3>
            <p class="mb-7" style="text-align: start;">You may edit your details in the form below. Click 'Update' to save your new information details.</p>
            <form method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <?php
                if (mysqli_num_rows($resul) > 0) {
                ?>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($resul)) {
                    ?>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <input name="username" value="<?php echo $row['username']; ?>" type="text" id="form6Example3" class="form-control" />
                            <label class="form-label" for="form6Example3">Username</label>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <input value="<?php echo $row['password']; ?>" name="password" type="password" id="form6Example4" class="form-control" />
                            <label class="form-label" for="form6Example4">Password</label>
                        </div>

                        <!-- Email input -->


                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <input value="<?php echo $row['phonenumber']; ?>" name="phonenumber" type="number" id="form6Example6" class="form-control" />
                            <label class="form-label" for="form6Example6">Phone number</label>
                        </div>

                        <!-- Message input -->


                        <!-- Checkbox -->
                    <?php
                        $i++;
                    }
                    ?>
                <?php
                } else {
                    echo "No result found";
                }
                ?>


                <div id="container">
                    <button type="reset" class="btn btn-danger " style="width: 100px;">Reset</button>


                    <button name="submit" type="submit" class="btn btn-primary " style="width: 100px;">Update</button>
                </div>



        </div>
        <!-- Submit button -->

        </form>
        </td>

        </tr>





        </tbody>
        </table>



        <script src="../../js/mdb.min.js"></script>
        <script src="./app.js"></script>
</body>

</html>