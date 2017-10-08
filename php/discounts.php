<?php

  include_once('functions.php');
  
  $query = "SELECT * FROM discount";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <caption>Discounts</caption>
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Discount Percentage</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $id      = $row['disc_id'];
    $name    = $row['disc_name'];
    $price   = $row['disc_price'];

    echo "<tr class='discounts' onclick='javascript:discount_load()' id = '" . $id . "'>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td align='right'>" . $price . "</td>";
    echo "</tr>";
  }


  mysqli_close($con);

?>