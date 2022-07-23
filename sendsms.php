<?php

include('dbconn.php');

$currdate = date("d-m-Y", strtotime("now"));
$qry = "SELECT * FROM `details` WHERE (enddate - $currdate) < 20";
$run = mysqli_query($conn, $qry);

if ($run == true) echo "";
else echo ("error: " . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send SMS - Subscriber Management System</title>
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">

    <script src="https://use.fontawesome.com/6b1ec90a67.js"></script>
</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="manager/managerdash.php">Manager Dashboard</a></li>
                <li><a href="user/adduser.php">Add Subsriber</a></li>
                <li><a href="sendsms.php">Send SMS</a></li>
                <li><a href="print.php" target=" ">Print Data</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 95%; text-align: center;">
                            <tr>
                                <th>Name</th>
                                <th>End Date</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {

                                $phone = $row['phone'];

                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['enddate'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td> 
                                <a href='message.php?phone=$phone'> 
                                <i class='fa fa-send' aria-hidden='true'> 
                                </i> 
                                </a> 
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>