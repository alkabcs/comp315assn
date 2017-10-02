<?php

  include_once('functions.php');

  $fetch_id = $_GET["disc_id"];

  $query = "SELECT * FROM discount WHERE disc_id = '" . $fetch_id . "'";

  $result = mysqli_query($con, $query);

  echo "<div class=\"discount_load\">";

  while($row = mysqli_fetch_assoc($result)) {
    $id      = $row['disc_id'];
    $name    = $row['disc_name'];
    $price   = $row['disc_price'];
  }

  echo "<div class=\"box name\">";
  echo "<p>ID: " . $id . "</p>";
  echo "</div>";
  echo "<div class=\"box info\">";
  echo "<p>Name: " . $name . "</p>";
  echo "<p>Discount: " . $price . "</p>";
  echo "<button id=\"update\" onclick=\"discount_update('" . $id . "')\">Update</button>";
  echo "</div>";

  mysqli_close($con);

?>