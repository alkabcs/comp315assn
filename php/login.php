<?php

  include_once('functions.php');


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
