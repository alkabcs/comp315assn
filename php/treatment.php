<?php

  include_once('functions.php');
  
  $query = "SELECT * FROM treatment";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <tr>
  <th>ID</th>
  <th>Type</th>
  <th>Time</th>
  <th>Fee</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $id      = $row['treat_id'];
    $name    = $row['treat_type'];
    $time    = $row['treat_time'];
    $fee     = $row['treat_fee'];

    echo "<tr class='discounts' onclick='javascript:treatment_load()' id = '" . $id . "'>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $time . "</td>";
    echo "<td>" . $fee . "</td>";
    echo "</tr>";
  }


  mysqli_close($con);

?>