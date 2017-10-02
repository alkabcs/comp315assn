<?php

  include_once('functions.php');

  $fetch_id = $_GET["id"];
  $fetch_name = $_GET["name"];

  $query = "SELECT client.*, appointment.appt_notes, appointment.appt_id FROM client INNER JOIN appointment ON client.client_id = appointment.client_id WHERE client.client_id=" . $fetch_id . "";

  $result = mysqli_query($con, $query);

  echo "<div class=\"client_load\">";

  while($row = mysqli_fetch_assoc($result)) {
    $cid      = $row['client_id'];
    $aid      = $row['appt_id'];
    $fname    = ucfirst($row['client_fname']);
    $lname    = ucfirst($row['client_lname']);
    $email    = strtolower($row['client_email']);
    $address  = ucfirst($row['client_address']);
    $dob      = $row['client_dob'];
    $gender   = ucfirst($row['client_gender']);
    if ($gender == 'Male') {
      $gender_two = 'Female';
    } else {
      $gender_two = 'Male';
    }
    $home     = $row['client_home'];
    $mobile   = $row['client_mobile'];
    $notes    = $row['appt_notes'];
  }

  echo "<div class=\"box name\">";
  echo "<p>Name: <input type=\"text\" id=\"fname\" name=\"fname\" value=\"" . $fname . "\"> Last Name: <input type=\"text\" id=\"lname\" value=\"" . $lname . "\"> Email: <input type=\"text\" id=\"email\" value=\"" . $email . "\"></p>";
  echo "</div>";
  echo "<div class=\"box info\">";
  echo "<p>Address: <input type=\"text\" id=\"address\" value=\"" . $address . "\"> Date of Birth: <input type=\"text\" id=\"dob\" placeholder=\"yyyy-mm-dd\" value=\"" . $dob . "\"> Gender: <select id=\"gender\"><option>" . $gender . "</option><option>" . $gender_two . "</option></select></p>";
  echo "<p>Home Phone: <input type=\"text\" id=\"home\" value=\"" . $home . "\"> Mobile: <input type=\"text\" id=\"mobile\" value=\"" . $mobile . "\"></p>";
  echo "</div>";
  echo "<div class=\"box notes\">";
  echo "<textarea id=\"notes\">" . $notes . "</textarea>";
  echo "<button id=\"update\" onclick=\"client_update('" . $cid . "')\">Update</button>";
  echo "</div>";

  mysqli_close($con);

?>
