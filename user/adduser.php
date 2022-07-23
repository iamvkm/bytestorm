<?php

if (isset($_POST['submit'])) {

    include('../dbconn.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $phone = $_POST['phone'];
    $subdate = $_POST['subdate'];

    $time = $_POST['time'];
    $period = $_POST['period'];
    $membertime = $time . ' ' . $period;

    if ($period == "Months")  $enddate = date('d-m-Y', strtotime("+" . $time . " months", strtotime($subdate)));
    else if ($period == "Years") $enddate = date('d-m-Y', strtotime("+" . $time . " years", strtotime($subdate)));
    else $enddate = date('d-m-Y', strtotime("+25 years", strtotime($subdate)));;

    $qry = "INSERT INTO details " . "(name,email,address,pincode,phone,subdate,membertime,enddate)" . " VALUES "
        . "('$name','$email','$address','$pincode','$phone','$subdate','$membertime','$enddate')";
    $run = mysqli_query($conn, $qry);

    if ($run == true) echo "
        <script>
            confirm('User Account Added! Redirecting to Dashboard.');
            window.open('../manager/managerdash.php','_self');
        </script>
    ";
    else echo ("error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Subscriber Account - Subscriber Management System</title>
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
          user-scalable=no, maximum-scale=1, minimum-scale=1">
    <!-- Fevicon -->
    <link rel="shortcut icon" href="..img/sample.jpg" type="image/x-icon">
    <link rel="icon" href="..img/sample.jpg" type="image/x-icon">
    <!-- Basic Meta-Tags -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="classification" content="Productivity" />
    <meta name="distribution" content="global" />
    <meta name="theme-color" content="#482879" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link href="../css/sidebar.css" rel="stylesheet">
    <link href="../css/formstyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="../manager/managerdash.php">Manager Dashboard</a></li>
                <li><a href="#">Add Subsriber</a></li>
                <li><a href="../sendsms.php">Send SMS</a></li>
                <li><a href="../print.php" target=" ">Print Data</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </div>

        <!-- Page Content -->
        <div class="container d-flex justify-content-center" style="text-align: center;">
            <div class="row">
                <div class="login-page">
                    <div class="form">
                        <form class="login-form" action="adduser.php" method="post">
                            <input type="text" placeholder="Full Name" name="name" required />
                            <input type="text" placeholder="Email Id" name="email" required />
                            <input type="text" placeholder="Address" name="address" required />
                            <input type="text" placeholder="Pincode" name="pincode" required />
                            <input type="text" placeholder="Phone Number" name="phone" required />
                            <input type="text" placeholder="Subscription Date (DD-MM-YYYY)" name="subdate" required />
                            <div class="form-group">
                                <input type="text" placeholder="Membership Period" name="time" required />
                                <select class="form-control" name="period">
                                    <option>Months</option>
                                    <option>Years</option>
                                    <option>Lifetime</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="Submit">
                                Add Subscriber Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>

</html>