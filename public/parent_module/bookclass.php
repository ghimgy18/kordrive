<?php
include '../config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
error_reporting(0);
$resul = mysqli_query($conn, "SELECT * FROM instructor");
$child =  mysqli_query($conn, "SELECT childname FROM parent WHERE email = '$_SESSION[email]'");

if (isset($_POST['submit'])) {
    $row = mysqli_fetch_array($child);
    list($username,$instructoremail) = explode('|', $_POST['username']);
    // $username = $_POST['username'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    // $instructoremail = $_POST['email'];
    $childname = $row['childname'];
    $email = $_SESSION['email'];

    $status = 'Verifying';
    $sql = "INSERT INTO booking (instructorname, date, time,childname,email,instructoremail,status)
VALUES (' $username ', ' $date ', ' $time ', '$childname','$email','$instructoremail' ,'$status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Wow! sukses.')</script>";
        echo "<script>window.location = home.php</script>";
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
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
                    <h1 style="padding-left: 305px; text-align: center;">Book Class</h1>
                    <div style="padding-left: 50%; padding-top: 10%;">


                        <form method="post">

                            <?php
                            if (mysqli_num_rows($resul) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_array($resul)) {
                            ?>

                                    <div style="padding-top: 10px;" class="form-check ">
                                        <input value="<?php echo $row['username']; ?>|<?php echo $row['email']; ?> " class="form-check-input" type="radio" name="username" id="flexRadioDefault1" />
                                        <label style="margin-left: 50px;" class="form-check-label" for="flexRadioDefault1">
                                            <h2>Mr <?php echo $row['username']; ?> </h2>
                                        </label>
                                        <!-- <input  name="email" value="<?php echo $row['email']; ?>" /> -->
                                    </div>
                            <?php




                                    $i++;
                                }
                            } else {
                                echo "No result found";
                            }
                            ?>






                            <label for="birthday">Date:</label>
                            <input style="  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 190px;" type="date" id="date" name="date" min="<?php echo date("Y-m-d"); ?>" required value="<?php echo $date; ?>">
                            <label for="appt">Select a time:</label>
                            <input type="time" id="appt" name="time" required value="<?php echo $time; ?>">
                            <div class="col">
                                <button name="submit" type="submit" class="btn btn-primary btn-block ">Book</button>
                            </div>
                    </div>


                    </div>


                    </form>



                </td>

            </tr>





        </tbody>
    </table>



    <script src="../../js/mdb.min.js"></script>
    <script src="./app.js"></script>
</body>

</html>