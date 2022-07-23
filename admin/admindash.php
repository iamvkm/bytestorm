<?php

session_start();
if (isset($_SESSION['uid'])) echo "";
else header('location: ../index.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Admin Dashboard - Subsriber Management System</title>
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
     <link href="../css/homepage.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
</head>

<body>
     <div class="container d-flex justify-content-center" style="text-align: center;">
          <div class="row">
               <div class="mt-5">
                    <br><br><img src="../images/me.jpg" class="img-responsive rounded-circle center"><br><br><br>
                    <h4>Welcome Admin!</h4><br>
                    <a href="addmanager.php"><button class="btn btn-primary">
                              Add Manager Account</button></a><br><br>
                    <a href="updatemanager.php"><button class="btn btn-primary">
                              Update Manager Account</button></a><br><br>
                    <a href="deletemanager.php"><button class="btn btn-primary">
                              Delete Manager Account</button></a><br><br>
                    <h6><a href="../logout.php">LOG OUT</a></h6>
               </div>
          </div>
     </div>
     <!-- Bootstrap core JavaScript -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>