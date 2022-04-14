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


    $password = $_POST['password'];

    $sql = "SELECT * FROM instructor WHERE username='$username'";
    $result = mysqli_query($conn, $sql);



    if (!$result->num_rows > 0) {
        $sql = "UPDATE instructor  SET username='$_POST[username]', phonenumber= '$phonenumber',password = '$_POST[password]' WHERE email='$_SESSION[email]'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Wow! User Registration Completed.')</script>";
            echo "<meta http-equiv='refresh' content='1'>";



            $phonenumber = $row['phonenumber'];
            $childname = $row['childname'];
            $address = $row['address'];
            $password = $row['password'];
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Some value are same as the old one.')</script>";
    }
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
</head>

<body>
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">
                    <h1>Instructor</h1>



                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="col">
                    <a href="/pages/instructor_module/home.html">Homepage</a>

                </th>
                <th scope="col">
                    <a href="/index.html">Logout</a>

                </th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th style="width: 200px;">
                    <div style="padding-bottom: 25px;">
                        <button onclick="gohomepage()" style="height: 100px; width: 200px; ">
                            Homepage
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="goeditprofile()" style="height: 100px; width: 200px;">
                            Edit Profile
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gocheckbooking()" style="height: 100px; width: 200px;">
                            Check Booking
                        </button>
                    </div>
                </th>

                <td>
                    <h1 style="padding-left: 305px; text-align: center;">Edit Profile</h1>
                    <form style="padding-left: 305px;" method="POST">
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
                        <div class="row ">
                            <div class="col">
                                <button type="reset" class="btn btn-primary btn-block ">Reset</button>
                            </div>
                            <div class="col">
                                <button name="submit" type="submit" class="btn btn-primary btn-block ">Update</button>
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