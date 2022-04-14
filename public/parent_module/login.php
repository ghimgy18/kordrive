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
    <link rel="stylesheet" href="../../styles.css">


    <title>Login Page</title>
</head>

<body id="login">
    <div style="padding-top: 10%;"></div>
    <h2 class="text-center" style="padding-left: 70px; padding-bottom: 2%;">Welcome Back Parents!</h2>
    <div style="padding-left: 45%; padding-right: 30;">

        <form method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4" style="width: 30%; ">
                <input name="username" value="<?php echo $username; ?>" type="text" id="firstname" class="form-control" />
                <label class="form-label" for="form2Example1">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4" style="width: 30%; ">
                <input name="password" value="<?php echo $_POST['password']; ?>" type="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->


            <!-- Submit button -->
            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4" style="width: 30%;">Sign
                in</button>

            <!-- Register buttons -->
            <div style="justify-content: center;">
                <p>Not a member? <a href="register.php">Register</a></p>


            </div>

            <a href="../index.php">Back</a>

        </form>

    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="index.js"></script>
</body>

</html>