<?php

  include_once('functions.php');
  
  $query = "SELECT * FROM treatment ORDER BY treat_time ASC";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <caption>Treatments</caption>
  <tr>
  <th>Type</th>
  <th>Time</th>
  <th>Fee</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $id      = $row['treat_id'];
    $name    = $row['treat_type'];
    $time    = $row['treat_time'];
    $fee     = $row['treat_fee'];

    $time = explode(':', $time);

    echo "<tr>";
    echo "<td>" . $name . "</td>";
    echo "<td class='price'>" . (($time[0]*60) + ($time[1])) . "</td>";
    echo "<td class='price'>$" . $fee . "</td>";
    echo "</tr>";
  }


  mysqli_close($con);

?>