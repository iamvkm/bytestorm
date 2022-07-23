<?php

include('dbconn.php');

$search = $_POST['search'];
$qry = "SELECT name, email, address, pincode, phone FROM `details` WHERE name LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%' OR pincode LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' ";
$run = mysqli_query($conn, $qry);

if ($run == true) {
  echo "<table>
  <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Pincode</th>
      <th>Phone</th>
      <th>Action</th>
      <th>Action</th>
  </tr>";

  while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {

    $email = $row['email'];
    $phone = $row['phone'];

    echo "<tr>";

    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['pincode'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";

    echo "<td> 
    <a href='../user/modifyuser.php?email=$email&phone=$phone'> 
    <i class='fa fa-pencil' aria-hidden='true'> 
    </i> 
    </a> 
    </td>";

    echo "<td> 
    <a href='../user/deleteuser.php?email=$email&phone=$phone'> 
    <i class='fa fa-trash' aria-hidden='true'> 
    </i> 
    </a> 
    </td>";

    echo "</tr>";
  }

  echo "</table>";
} else echo ("error: " . mysqli_error($conn));
