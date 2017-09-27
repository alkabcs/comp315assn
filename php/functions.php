<?php

  function loadHome($username) {

    print ("<div id=\"welcome_div\">");
      print ("<p>Welcome " . $username . "</br>" . date("D M d, Y G:i a") . "</p>");
      print("<button id=\"\" onclick=\"logout()\">Logout</button>");
    print ("</div>");

    $con = mysqli_connect('localhost', 'root', 'root', 'wellness_clinic');

    $query = "SELECT * FROM clients";

    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)) {
      $fname = $row['client_fname'];
      $lname = $row['client_lname'];
      $email = $row['client_email'];
      $address = $row['client_address'];
      $dob = $row['client_dob'];
      $gender = $row['client_gender'];
      $home = $row['client_home'];
      $mobile = $row['client_mobile'];
    }



  }

?>
