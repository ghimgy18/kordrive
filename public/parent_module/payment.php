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
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">
                    <h1>Parent</h1>



                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="col">
                    <a href="home.php">Homepage</a>

                </th>
                <th scope="col">
                    <a href="../logout.php">Logout</a>

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
                    <h1 style="padding-left: 305px; text-align: center;">Payment</h1>
                    <form style="padding-left: 305px;">
                        <!-- 2 column grid layout with text inputs for the first and last names -->


                        <!-- Text input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example3" class="form-control" />
                            <label class="form-label" for="form6Example3">Name:</label>
                        </div>



                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <input type="number" id="form6Example6" class="form-control" />
                            <label class="form-label" for="form6Example6">Amount:</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form6Example7" rows="2"></textarea>
                            <label class="form-label" for="form6Example7">Payment Method</label>
                        </div>





                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block ">Pay</button>
                        </div>




                        <!-- Submit button -->

                    </form>
                </td>

            </tr>





        </tbody>
    </table>



    <script src="../../js/mdb.min.js"></script>
    <script src="../parent_module/app.js"></script>
</body>

</html>