<?php
if (isset($_POST['submit'])) {
     include('../dbconn.php');
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $qry = "SELECT * FROM `manager` WHERE name='$name' AND phone LIKE '%$phone%';";
     $run = mysqli_query($conn, $qry);

     if (mysqli_num_rows($run) < 1) {
          ?>
          <script>
               alert("Invalid Details!");
          </script>
     <?php
     } else  header('location: updatedetails.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Update Manager Account - Subscriber Management System</title>
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
     <link href="../css/formstyle.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
</head>

<body>
     <div class="container d-flex justify-content-center" style="text-align: center;">
          <div class="row">
               <div class="login-page">
                    <div class="form">
                         <form class="login-form" action="updatemanager.php" method="post">
                              <input type="text" placeholder="Full Name" name="name" required />
                              <input type="text" placeholder="Phone Number" name="phone" required />
                              <div id="main"></div>
                              <button type="submit" class="btn btn-primary" name="submit" value="Submit">
                                   Update Manager Account</button><br><br>
                              <h6><a href="admindash.php">Back to Dashboard</a></h6>
                         </form>
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