<?php

  $con = mysqli_connect('localhost', 'root', 'root', 'wellness_clinic');
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  $username = $_GET["username"];
  $password = $_GET["password"];
  $_COOKIE['username'] = $username;

  $query = "SELECT * FROM admin";

  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)) {
    $username_found = $row['admin_email'];
    $password_found = $row['admin_passwd'];
  }

  if($password_found == $password) {
    include("../admin_home.php");
  } else {
    print('Error');
  }

  mysqli_close($con);

?>
