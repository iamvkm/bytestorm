<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../index.php');

include('../dbconn.php');

// Counts 5 Years Subscribers
$qry = "SELECT COUNT(*) FROM details WHERE membertime='5 YRS'";
$run = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($run);
$FiveCount = $row[0];

// Counts 10 Years Subscribers
$qry = "SELECT COUNT(*) FROM details WHERE membertime='10 YRS'";
$run = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($run);
$TenCount = $row[0];

// Counts LifeTime Subscribers
$qry = "SELECT COUNT(*) FROM details WHERE membertime='LM'";
$run = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($run);
$LifeCount = $row[0];

// Counts Other Subscribers
$qry = "SELECT COUNT(*) FROM details WHERE membertime NOT IN ('5 YRS','10 YRS','LM')";
$run = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($run);
$OtherCount = $row[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Manager Dashboard - Subsriber Management System</title>
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
     <link href="../css/custom.css" rel="stylesheet">
     <link href="../css/sidebar.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <!------ TRIGGERS AJAX REQUEST ----->
     <script src="../js/main.js"></script>
     <script src="https://use.fontawesome.com/6b1ec90a67.js"></script>

</head>

<body>

     <div id="wrapper">
          <!-- Sidebar -->
          <div id="sidebar-wrapper">
               <ul class="sidebar-nav">
                    <li class="sidebar-brand"><a href="managerdash.php">Manager Dashboard</a></li>
                    <li><a href="../user/adduser.php">Add Subsriber</a></li>
                    <li><a href="../sendsms.php">Send SMS</a></li>
                    <li><a href="../print.php" target=" ">Print Data</a></li>
                    <li><a href="../logout.php">Log Out</a></li>
               </ul>
          </div>

          <!-- Page Content -->
          <div id="page-content-wrapper">
               <div class="container">
                    <div class="row">
                         <div class="col-md-12">
                              <h2>Welcome <?php echo $_SESSION['uid1']; ?>!</h2>
                              <div class="row" id="one">
                                   <div class="col-md-10">
                                        <!---- BELOW IS SEARCH BAR ------>
                                        <input type="text" class="form-control" name="search_text" id="search_text" placeholder="Search Input ..." />
                                   </div>
                                   <div class="col-md-2">
                                        <button class="btn btn-primary"><a href="managerdash.php">Refresh</a></button>
                                   </div>
                              </div>
                              <!---- BELOW IS RESULT SECTION ------>
                              <div id="result"></div>

                              <div class="row">
                                   <div class="col-md-3">
                                        <div id="box"><?php echo $TenCount ?><br>10 Years</div>
                                   </div>
                                   <div class="col-md-3">
                                        <div id="box"><?php echo $LifeCount ?><br>Lifetime</div>
                                   </div>
                                   <div class="col-md-3">
                                        <div id="box"><?php echo $FiveCount ?><br>5 Years</div>
                                   </div>
                                   <div class="col-md-3">
                                        <div id="box"><?php echo $OtherCount ?><br>Others</div>
                                   </div>
                              </div>
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