<?php
include '../config.php';
session_start();

$id = $_GET['id'];


$query = mysqli_query($conn, "select * from `booking` where id='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <link rel="stylesheet" href="../styles.css">
    <title>Update</title>
</head>

<body>

    <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
            <div style="padding-top: 10%;"></div>
            <h2 class="text-center" style="padding-right: 10px; padding-bottom: 2%;"></h2>

            <form method="POST" action="update.php?id=<?php echo $id; ?>">
                <div class="card mx-auto text-center opacity-85" style="width: 35rem; height: 35rem;">
                    <div class="card-body">
                        <h4 class="card-title mb-7">
                            Confirmation </h4>
                        <div class="form-outline mb-4">
                            <input id="form2Example1" class="form-control" disabled="true" type="text" value="<?php echo $row['instructorname']; ?>" name="instructorname">
                            <label class="form-label" for="form2Example1">Instructor name:</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input id="form2Example2" class="form-control" disabled="true" type="text" value="<?php echo $row['date']; ?>" name="date">
                            <label class="form-label" for="form2Example2">Date :</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input id="form2Example3" class="form-control" disabled="true" type="text" value="<?php echo $row['time']; ?>" name="time">
                            <label class="form-label" for="form2Example3">Time :</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input id="form2Example4" class="form-control" disabled="true" type="text" value="<?php echo $row['childname']; ?>" name="childname">
                            <label class="form-label" for="form2Example4">Child name:</label>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Status:</label>
                            <select name="status" class="status" id="status">
                                <option value="Accepted">Accepted</option>
                                <option value="Declined">Declined</option>

                            </select>

                        </div>
                        <div class="form-outline mb-4">
                            <input id="comment" class="form-control" type="text" class="comment" name="comment" disabled="true">
                            <label class="form-label" for="comment">Reasons :</label>
                        </div>
                        <input type="submit" name="submit">
                        <a href="index.php">Back</a>
            </form>
        </div>
    </div>
    </div>
    <script src="../../js/mdb.min.js"></script>

</body>

</html>


<script>
    document.getElementById('status').addEventListener('change', function() {
        if (this.value == 'Declined') {
            document.getElementById('comment').disabled = false;
        } else {
            document.getElementById('comment').disabled = true;
        }
    });
</script>