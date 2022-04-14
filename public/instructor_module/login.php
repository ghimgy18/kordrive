<?php
include '../config.php';
session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

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
</head>

<body id="login">
    <div style="padding-top: 10%;"></div>
    <h2 class="text-center" style="padding-left: 30px; padding-bottom: 2%;">Welcome Back Instructor!</h2>
    <div style="padding-left: 40%; padding-right: 30;">

        <form method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4" style="width: 30%; ">
                <input name="username" value="<?php echo $username; ?>" type="text" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4" style="width: 30%; ">
                <input name="password" value="<?php echo $password; ?>" type="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->


            <!-- Submit button -->
            <button name="submit" type="submit" type="submit" class="btn btn-primary btn-block mb-4" style="width: 30%;">Sign
                in</button>




            <a href="../index.php">Back</a>

        </form>

    </div>


    <script src="../../js/mdb.min.js"></script>
    <script src="../instructor_module/app.js"></script>
</body>

</html>