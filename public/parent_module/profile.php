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

    $childname = $_POST['childname'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM parent WHERE username='$username'";
    $result = mysqli_query($conn, $sql);



    if (!$result->num_rows > 0) {
        $sql = "UPDATE parent  SET username='$_POST[username]', phonenumber= '$phonenumber',childname= '$_POST[childname]',address = '$_POST[address]',password = '$_POST[password]' WHERE email='$_SESSION[email]'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Wow! User Registration Completed.')</script>";
            echo "<meta http-equiv='refresh' content='1'>";



            $phonenumber = $row['phonenumber'];
            $childname = $row['childname'];
            $address = $row['address'];
            $password = md5($row['password']);
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Some value are same as the old one.')</script>";
    }
}
$resul = mysqli_query($conn, "SELECT * FROM parent WHERE email = '$_SESSION[email]'");
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
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <div class="mx-auto order-0 ">
                        <a class="navbar-brand mx-auto" href="#">Parent</a>

                </li>
            </ul>
        </div>

        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="/pages/parent_module/home.html" class="nav-link">Homepage</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php
                    " class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <table class="table">
       
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
                        <button onclick="gobookclass()" style="height: 100px; width: 200px;">
                            Book class
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gobookstatus()" style="height: 100px; width: 200px;">
                            Booking Status
                        </button>
                    </div>
                    <div style="padding-bottom: 25px;">
                        <button onclick="gopayment()" style="height: 100px; width: 200px; ">
                            Payment
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
                                    <input value="<?php echo $row['username']; ?>" name="username" type="text" id="form6Example3" class="form-control" />
                                    <label class="form-label" for="form6Example3"><?php echo $row['username'] ?></label>
                                </div>

                                <!-- Text input -->
                                <div class="form-outline mb-4">
                                    <input value="<?php echo $row['password']; ?>" name="password" type="password" id="form6Example4" class="form-control" />
                                    <label class="form-label" for="form6Example4">Password</label>
                                </div>

                                <!-- Email input -->
                                <!-- <div class="form-outline mb-4">
                                    <input name="email" type="email" id="form6Example5" class="form-control" />
                                    <label class="form-label" for="form6Example5"></label>
                                </div> -->

                                <!-- Number input -->
                                <div class="form-outline mb-4">
                                    <input value="<?php echo $row['phonenumber']; ?>" name="phonenumber" type="number" id="form6Example6" class="form-control" />
                                    <label class="form-label" for="form6Example6"><?php echo $row['phonenumber'] ?></label>
                                </div>

                                <!-- Message input -->
                                <div class="form-outline mb-4">

                                    <input value="<?php echo $row['address']; ?>" name="address" type="text" class="form-control" id="form6Example7" />


                                    <label class="form-label" for="form6Example7"><?php echo $row['address'] ?></label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-outline mb-4">
                                    <input value="<?php echo $row['childname']; ?>" name="childname" type="text" id="form6Example4" class="form-control" />
                                    <label class="form-label" for="form6Example4"><?php echo $row['childname'] ?></label>
                                </div>
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