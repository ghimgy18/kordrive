<?php
include 'config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Driving School Online Booking System</title>
</head>

<body id="intro">

    <div id="padding" class="d-flex justify-content-center flex-row">
        <div class="card" style="width: 18rem; height: 18rem;">
            <img class="card-img-top" src="images/parent.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Parent</h5>

                <a href="parent_module/login.php" class="btn btn-primary">Log In</a>
            </div>
        </div>
        <div id="space"></div>
        <div class="card" style="width: 18rem; height: 18rem;">
            <img class="card-img-top" src="images/instructor.jpeg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">instructor</h5>

                <a href="instructor_module/login.php" class="btn btn-primary">Log In</a>
            </div>
        </div>
        <div id="space"></div>
        <div class="card" style="width: 18rem; height: 18rem;">
            <img id="adminimg" class="card-img-top" src="images/admin.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Admin</h5>

                <a href="./admin_module/login.php" class="btn btn-primary">Log In</a>
            </div>
        </div>
    </div>









    <!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->


    <script src="../public/index.js"></script>
</body>

</html>