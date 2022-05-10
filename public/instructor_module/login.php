<?php
include '../config.php';
session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM instructor WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];

        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phonenumber'] = $row['phonenumber'];



        header("Location: home.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
    </style>
</head>
</head>

<body id="login">
    <div id="intro3" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">


                <div style="padding-top: 10%;"></div>
                <h2 class="text-center" style="padding-right: 10px; padding-bottom: 2%;"></h2>


                <form method="POST">
                    <div class="card mx-auto text-center opacity-85" style="width: 28rem; height: 25rem;">

                        <div class="card-body">
                            <h4 class="card-title mb-7">
                                Welcome Back Instructor!
                            </h4>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="username" value="<?php echo $username; ?>" type="text" id="form2Example1" class="form-control" />
                                <label class="form-label" for="form2Example1">Username</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" value="<?php echo $password; ?>" type="password" id="form2Example2" class="form-control" />
                                <label class="form-label" for="form2Example2">Password</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->


                            <!-- Submit button -->
                            <button name="submit" type="submit" type="submit" class="btn btn-primary btn-block mb-7">Sign
                                in</button>




                            <a href="../index.php">Back</a>

                </form>

            </div>
        </div>
    </div>

    <script src="../../js/mdb.min.js"></script>
    <script src="../instructor_module/app.js"></script>
</body>

</html>