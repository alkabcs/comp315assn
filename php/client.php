<?php

  $con = mysqli_connect('localhost', 'root', 'root', 'wellness_clinic');
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT * FROM client";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $fname    = $row['client_fname'];
    $lname    = $row['client_lname'];
    $email    = $row['client_email'];
    $address  = $row['client_address'];
    $dob      = $row['client_dob'];
    $gender   = $row['client_gender'];
    $home     = $row['client_home'];
    $mobile   = $row['client_mobile'];

    echo "<tr>";
    echo "<td><a href='javascript:client_load()'>" . $fname . "<a/></td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "</tr>";
  }

  mysqli_close($con);

?>
