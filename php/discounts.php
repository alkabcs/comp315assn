<?php

  include_once('functions.php');
  
  $query = "SELECT * FROM discount ORDER BY disc_price";

  $result = mysqli_query($con, $query);

  echo "<table id=\"client_list\">
  <caption>Discounts</caption>
  <tr>
  <th>Name</th>
  <th>Discount Percentage</th>
  </tr>";

  while($row = mysqli_fetch_assoc($result)) {
    $id      = $row['disc_id'];
    $name    = $row['disc_name'];
    $price   = $row['disc_price'];

    echo "<tr>";
    echo "<td>" . $name . "</td>";
    echo "<td class='price'>" . $price . "</td>";
    echo "</tr>";
  }


  mysqli_close($con);

?>