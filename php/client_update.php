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

  $query = "UPDATE client 
            SET client_fname='" . $fname . "', 
                client_lname='" . $lname . "', 
                client_email='" . $email . "', 
                client_address='" . $address . "', 
                client_dob='" . $dob . "', 
                client_gender='" . $gender . "', 
                client_home='" . $home . "', 
                client_mobile='" . $mobile . "' 
            WHERE client_id='" . $id . "'";

  $result = mysqli_query($con, $query);

  $query = "UPDATE appointment SET appt_notes='" . $notes . "' WHERE client_id='" . $id . "'";

  $result = mysqli_query($con, $query);

  if ($gender=='female') {

    $query = "UPDATE questionnaire
            SET q_find='" . $q_find . "',
                q_injuries='" . $q_injuries . "',
                q_health='" . $q_health . "',
                q_massage='" . $q_massage . "',
                q_type='" . $q_type . "',
                q_oils='" . $q_oils . "'
            WHERE questionnaire.client_id = '" . $id . "'";

    $result = mysqli_query($con, $query);
  }

  mysqli_close($con);


 ?>
