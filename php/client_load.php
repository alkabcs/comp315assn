<?php

  $con = mysqli_connect('localhost', 'root', 'root', 'wellness_clinic');
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    $fetch_id = $_GET["id"];

  $query = "SELECT client.*, appointment.appt_notes FROM client INNER JOIN appointment ON client.client_id = appointment.appt_id WHERE client.client_id=" . $fetch_id . "";

  $result = mysqli_query($con, $query);

  echo "<div class=\"client_load\">";

  while($row = mysqli_fetch_assoc($result)) {
    $id       = $row['client_id'];
    $fname    = ucfirst($row['client_fname']);
    $lname    = ucfirst($row['client_lname']);
    $email    = strtolower($row['client_email']);
    $address  = ucfirst($row['client_address']);
    $dob      = $row['client_dob'];
    $gender   = ucfirst($row['client_gender']);
    $home     = $row['client_home'];
    $mobile   = $row['client_mobile'];
  }

  echo "<div class=\"box name\">";
  echo "<p>Name: " . $fname . " " . $lname . " Email: " . $email . "</p>";
  echo "</div>";
  echo "<div class=\"box info\">";
  echo "<p>Address: " . $address . " Date of Birth: " . $dob . " Gender: " . $gender . "</p>";
  echo "<p>Home Phone: " . $home . " Mobile: " . $mobile . "</p>";
  echo "</div>";
  echo "<div class=\"box notes\">";
  echo "</div>";

  mysqli_close($con);

?>
