<?php

    include_once('functions.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $home = $_POST['home'];
    $mob = $_POST['mob'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_POST['genderSelection-female'] == "Yes") {
        $gender = "female";
        $find = $_POST['contact'];
        $injury = $_POST['injury'];
        $condition = $_POST['condition'];
        $massbefore = $_POST['massbefore'];
        $masstype = $_POST['masstype'];
        $arom = $_POST['armon'];

        $query = "INSERT INTO client () 
                    VALUES ()";

        $result = mysqli_query($con, $query);


    } else if ($_POST['genderSelection-male'] == "Yes") {
        $gender = "male";
        
    }

?>

