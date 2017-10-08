<?php

  include_once('functions.php');
  
  $query = "SELECT * FROM client";

  $result = mysqli_query($con, $query);
  echo "<div>";
  echo "<button id=\"client_new\" onclick=\"client_new()\">Add Client</button>";
  echo "<input type=\"text\" id=\"myInput\" onkeyup=\"client_search()\" class=\"txtBox\" placeholder=\"Client search...\">";
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
  echo "</table>";
  echo "</div>";

  mysqli_close($con);

?>
