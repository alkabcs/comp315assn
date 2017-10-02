<?php

  include_once('functions.php');

  $fetch_id = $_GET["id"];
  $fetch_name = $_GET["name"];

  $query = "SELECT client.*, appointment.appt_notes, appointment.appt_id FROM client INNER JOIN appointment ON client.client_id = appointment.client_id WHERE client.client_id=" . $fetch_id . "";

  $result = mysqli_query($con, $query);

  echo "<div class=\"client_load\">";
  echo "<div class=\"box name\">";
  echo "<p>Name: <input type=\"text\" id=\"fname\" placeholder=\"First Name\"> Last Name: <input type=\"text\" id=\"lname\" placeholder=\"Family Name\"> Email: <input type=\"text\" id=\"email\" placeholder=\"email@example.com\"></p>";
  echo "</div>";
  echo "<div class=\"box info\">";
  echo "<p>Address: <input type=\"text\" id=\"address\" placeholder=\"Address\"> Date of Birth: <input type=\"text\" id=\"dob\" placeholder=\"yyyy-mm-dd\" placeholder=\"\"> Gender: <select id=\"gender\"><option></option><option>Male</option><option>Female</option></select></p>";
  echo "<p>Home Phone: <input type=\"text\" id=\"home\" placeholder=\"Home Phone Number\"> Mobile: <input type=\"text\" id=\"mobile\" placeholder=\"Mobile Number\"></p>";
  echo "</div>";
  echo "<div class=\"box notes\">";
  echo "<button id=\"add\" onclick=\"client_add()\">Add Client</button>";
  echo "</div>";

?>
