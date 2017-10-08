<?php

  include_once('functions.php');

  $fetch_id = $_GET["treat_id"];

  $query = "SELECT * FROM treatment WHERE treat_id = '" . $fetch_id . "'";

  $result = mysqli_query($con, $query);

  echo "<div class=\"treatment_load\">";

  while($row = mysqli_fetch_assoc($result)) {
    $id     = $row['treat_id'];
    $type   = $row['treat_type'];
    $time   = $row['treat_time'];
    $fee    = $row['treat_fee'];
  }

  echo "<div class=\"box name\">";
  echo "<p>ID: <input type='text' id='" . $id . "' value='" . $id . "'></p>";
  echo "</div>";
  echo "<div class=\"box info\">";
  echo "<p>Type: <input type='text' id='" . $type . "' value='" . $type . "'></p>";
  echo "<p>Time: <input type='text' id='" . $time . "' value='" . $time . "'></p>";
  echo "<p> Fee: <input type='text' id='" . $fee  . "' value='" . $fee . "'></p>";
  echo "<button id=\"update\" onclick=\"treatment_update('" . $id . "')\">Update</button>";
  echo "</div>";

  mysqli_close($con);

?>