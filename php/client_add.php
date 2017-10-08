<?php

  include_once('functions.php');

  $id = $_GET['cid'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $email = $_GET['email'];
  $address = $_GET['address'];
  $dob = $_GET['dob'];
  $gender = $_GET['gender'];
  $home = $_GET['home'];
  $mobile = $_GET['mobile'];
  $notes = $_GET['notes'];

  $query = "INSERT INTO client (client_fname, client_lname, client_email, client_address, client_dob, client_gender, client_home, client_mobile, admin_id) 
            VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $address . "', '" . $dob . "', '" . $gender . "', '" . $home . "', '" . $mobile . "', '1')";

  $result = mysqli_query($con, $query);

  mysqli_close($con);

 ?>
