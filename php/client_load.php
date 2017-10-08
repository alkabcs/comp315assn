<?php

  include_once('functions.php');

  $fetch_id = $_GET["id"];
  $fetch_name = $_GET["name"];

  $query = "SELECT c.*, a.appt_notes, a.appt_id, q.* 
              FROM client c
              INNER JOIN appointment a
                ON c.client_id = a.client_id 
              LEFT JOIN questionnaire q
                ON q.client_id = c.client_id
              WHERE c.client_id=" . $fetch_id . "";
              
  $result = mysqli_query($con, $query);

  echo "<div class='client_load'>";

  while($row = mysqli_fetch_assoc($result)) {
    $cid      = $row['client_id'];
    $aid      = $row['appt_id'];
    $fname    = ucfirst($row['client_fname']);
    $lname    = ucfirst($row['client_lname']);
    $email    = strtolower($row['client_email']);
    $address  = ucfirst($row['client_address']);
    $dob      = $row['client_dob'];
    $gender   = ucfirst($row['client_gender']);
    if ($gender == 'Male') {
      $gender_two = 'Female';
    } else {
      $gender_two = 'Male';
    }
    $home       = $row['client_home'];
    $mobile     = $row['client_mobile'];
    $notes      = $row['appt_notes'];
    $q_find     = $row['q_find'];
    $q_injuries = $row['q_injuries'];
    $q_health   = $row['q_health'];
    $q_massage  = $row['q_massage'];
    $q_type     = $row['q_type'];
    $q_oils     = $row['q_oils'];
  }

  echo "<div class='box name'>
          <p>First Name: <input type='text' id='fname' name='fname' value='" . $fname . "'></p>
          <p>Last Name: <input type='text' id='lname' value='" . $lname . "'></p> 
          <p>Email: <input type='text' id='email' value='" . $email . "'></p>
        </div>
        <div class='box info'>
          <p>Address: <input type='text' id='address' value='" . $address . "'></p>
          <p>Date of Birth: <input type='text' id='dob' placeholder='yyyy-mm-dd' value='" . $dob . "'></p> 
          <p>Gender:  <select id='gender'>
                        <option>" . $gender . "</option>
                        <option>" . $gender_two . "</option>
                      </select></p>
          <p>Home Phone: <input type='text' id='home' value='" . $home . "'></p> 
          <p>Mobile Phone: <input type='text' id='mobile' value='" . $mobile . "'></p>
        </div>
        <div class='box notes'>
          <p>Notes: <textarea id='notes'>" . $notes . "</textarea></p>
        </div>";

  if ($gender == 'Female'){
      echo "<div class='questionnaire'>
          <p>How did you hear about my clinic</p>
          <input type='text' id='hear_about' value='" . $q_find . "'> 
          <p>Have you had any injuries past or present</p>
          <input type='text' id='injuries' value='" . $q_injuries . "'>
          <p>Do you suffer from any health conditions</p>
          <input type='text' id='health_conditions' value='" . $q_health . "'>
          <p>Have you had a message before</p>
          <input type='text' id='massage_type' value='" . $q_massage . "'>
          <p>Massage Preferences</p>
          <input type='text' id='massage_type' value='" . $q_type . "'>
          <p>Use of aromatherapy</p>
          <input type='text' id='oils' value='" . $q_oils . "'>
       </div>";
  } else if ($gender == 'Male') {
    echo "<div class='questionnaire'>
            <p>How did you hear about my clinic? <input type='text' id='hear_about' value='" . $q_find . "'></p>
          </div>";
  }

  echo "<div class=''><button id='update' onclick='client_update(" . $cid . ")'>Update</button></div>";
        

  mysqli_close($con);

?>
