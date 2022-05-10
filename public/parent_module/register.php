<?php
include '../config.php';// connect database
session_start();// connect session to make sure its the right user that login, not different acc
error_reporting(0);// to hide default error in input 

if (isset($_POST['submit'])) { // listen to submit button
    
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $childname = $_POST['childname'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
   
 // store value to variable
    $sql = "SELECT * FROM parent WHERE email='$email'"; // query to check if email already exist or not
   
    $result = mysqli_query($conn, $sql);// execute the query on the parent database
    if (!$result->num_rows > 0) { // if no same email onthe table 
       
        $sql = "INSERT INTO parent (username,fullname,email,phonenumber,address,childname, password)
                VALUES ('$username','$fullname','$email','$phonenumber','$address','$childname','$password')"; //insert value query
        
        echo $fullname, $username, $phonenumber, $email, $childname, $address, $password;
        $result = mysqli_query($conn, $sql);
       
        if ($result) {
            echo 'masuk6';
            echo "<script>alert('Wow! User Registration Completed.')</script>";
            echo "<script>window.location = home.php</script>";
            $fullname = "";
            $username = "";
            $email = "";
            $phonenumber = "";
            $childname = "";
            $address = "";
            $_POST['password'] = "";
            // reset the value back after registered
        } else {
            echo 'masuk3';
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo 'masuk4';
        echo "<script>alert('Woops! Email Already Exists.')</script>";
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
    <title>Registration Page</title>
</head>

<body>
    <div style="padding-top: 10%;">
        <h3 class="text-center" style="padding-left: 70px; padding-bottom: 2%;">Create an account</h2>

            <div style="padding-left: 15%; padding-right: 10%;">




                <form id="signup-form" action="" method="POST">

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input required value="<?php echo $username; ?>" name="username" type="text" id="form3Example1" class="form-control" />
                                <label class="form-label" for="form3Example1">user name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input required value="<?php echo $fullname; ?>" name="fullname" type="text" id="form3Example2" class="form-control" />
                                <label class="form-label" for="form3Example2">full name</label>
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->


                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input required value="<?php echo $phonenumber; ?>" name="phonenumber" type="phone" id="form3Example1" class="form-control" />
                                <label class="form-label" for="form3Example1">Phone Number</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input required value="<?php echo $email; ?>" name="email" type="email" id="signup-email" class="form-control" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-outline mb-4">
                        <input required value="<?php echo $childname; ?>" name="childname" type="text" id="form3Example4" class="form-control" />
                        <label class="form-label" for="form3Example4">children name</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input required value="<?php echo $address; ?>" name="address" type="text" id="form3Example4" class="form-control" />
                        <label class="form-label" for="form3Example4">Address</label>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <input required value="<?php echo $_POST['$password']; ?>" name=" password" type="password" id="signup-password" class="form-control" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                    </div>



                    <!-- Submit button -->
                    <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Register</button>


                    <div style="justify-content: center;">
                        <p>Already have an account? <a href="login.php">Log In now</a></p>

                </form>












            </div>


    </div>
    <script src="../../js/mdb.min.js"></script>
</body>

</html>