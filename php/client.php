<?php

  $con = mysqli_connect('localhost', 'root', 'root', 'wellness_clinic');
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT * FROM client";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $id       = $row['client_id'];
    $fname    = ucfirst($row['client_fname']);
    $lname    = ucfirst($row['client_lname']);
    $email    = strtolower($row['client_email']);

    echo "<tr>";
    echo "<td id = " . $fname . ">" . $id . "</td>";
    echo "<td><a href='javascript:client_load()'>" . $fname . "<a/></td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "</tr>";
  }

  mysqli_close($con);

?>
