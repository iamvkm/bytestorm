<?php

$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

include('../dbconn.php');

$qry = "DELETE FROM `details` WHERE email='$email' AND phone='$phone';";
$run = mysqli_query($conn, $qry);

if ($run == true) echo "
        <script>
        confirm('User Account Deleted! Redirecting to Dashboard.');
        window.open('../manager/managerdash.php','_self');
        </script>
    ";
else echo ("error: " . mysqli_error($conn));
