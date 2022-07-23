<?php

include('../dbconn.php');
session_start();

if (isset($_POST['submit'])) {
    $new = $_POST['new'];

    $qry = "
    UPDATE details SET
    $_SESSION[field] = '$new'
    WHERE $_SESSION[field] = '$_SESSION[val]'
    ";

    $run = mysqli_query($conn, $qry);

    if ($run == true) echo "
        <script>
        confirm('User Account Updated! Redirecting to Dashboard.');
        window.open('../manager/managerdash.php','_self');
        </script>
    ";
    else echo ("error: " . mysqli_error($conn));
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
                        <form class="login-form" action="modifydata.php" method="post">
                            <p id="info">Old Value - <?php echo $_SESSION['val']; ?></p>
                            <input type="text" placeholder="Enter New Value" name="new" required />
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