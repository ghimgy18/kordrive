<?php
include '../config.php'; // connect database
session_start(); // connect session to make sure its the right user that login, not different acc

error_reporting(0);  // to hide default error in input 
if (isset($_SESSION['username'])) {  // if the session with the username somehow exist it will log in back(usually happen if user didn't log out)
    header("Location: home.php");
}
if (isset($_POST['submit'])) { // listen to submit button
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // md5 encrypt password

    $sql = "SELECT * FROM parent WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phonenumber'] = $row['phonenumber'];
        $_SESSION['childname'] = $row['childname'];
        $_SESSION['address'] = $row['address'];
        // store data in session so it can be used through out the files
        header("Location: home.php");
    } else {

        echo "<script>alert('Woops! username or Password is Wrong.')</script>";
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
    <link rel="stylesheet" href="../styles.css">


    <title>Login Page</title>
    <style>
        #background {
            /* background-image: url("images/2.jpg"); */
            height: 100vh;

        }

        /* Height for devices larger than 576px */
        /* @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      } */
    </style>
</head>

<body id="login">
    <div id="intro2" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">


                <div style="padding-top: 10%;"></div>
                <h2 class="text-center" style="padding-right: 10px; padding-bottom: 2%;"></h2>


                <form method="POST">
                    <div class="card mx-auto text-center opacity-85" style="width: 28rem; height: 25rem;">

                        <div class="card-body">
                            <h4 class="card-title mb-7">
                                Welcome Back Parents!
                            </h4>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="username" value="<?php echo $username; ?>" type="text" id="form2Example1" class="form-control" />
                                <label class="form-label" for="form2Example1">Username</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" value="<?php echo $_POST['password']; ?>" type="password" id="form2Example2" class="form-control" />
                                <label class="form-label" for="form2Example2">Password</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->


                            <!-- Submit button -->
                            <button name="submit" type="submit" class="btn btn-primary btn-block mb-7">Sign
                                in</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <h6>Not a member? <a style="text-decoration: underline;" href="register.php">Register Here</a></h6>


                            </div>

                            <a href="../index.php">Back</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="index.js"></script>
</body>

</html>