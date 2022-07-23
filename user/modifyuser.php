<?php

$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

if (isset($_POST['submit'])) {

    include('../dbconn.php');
    $field = $_POST['field'];

    if ($field == "Name") $field = "name";
    else if ($field == "Email Id") $field = "email";
    else if ($field == "Address") $field = "address";
    else if ($field == "Pincode") $field = "pincode";
    else if ($field == "Phone Number") $field = "phone";
    else if ($field == "Membership Period") $field = "membertime";
    else echo "";

    $qry = "SELECT $field FROM `details` WHERE email='$email' AND phone='$phone';";
    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        $row = mysqli_fetch_array($run);
        $value = $row[0];

        session_start();
        $_SESSION['field'] = $field;
        $_SESSION['val'] = $value;
    } else echo ("error: " . mysqli_error($conn));

    header("location: modifydata.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify User Account - Subscriber Management System</title>
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
                <li><a href="adduser.php">Add Subsriber</a></li>
                <li><a href="../sendsms.php">Send SMS</a></li>
                <li><a href="../print.php" target=" ">Print Data</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </div>

        <!-- Page Content -->
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="login-page">
                    <div class="form">
                        <form class="login-form" action="modifyuser.php" method="post">
                            <div class="form-group">
                                <p id="info">Which field to modify?</p>
                                <select class="form-control" name="field">
                                    <option>Name</option>
                                    <option>Email Id</option>
                                    <option>Address</option>
                                    <option>Pincode</option>
                                    <option>Phone Number</option>
                                    <option>Membership Period</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update User Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>