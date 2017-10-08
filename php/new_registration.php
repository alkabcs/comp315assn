<?php

    include_once('functions.php');

    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $dob = $_GET['dob'];
    $home = $_GET['home'];
    $mob = $_GET['mob'];
    $address = $_GET['address'];
    $email = $_GET['email'];
    $passwd = $_GET['password'];

    if (isset($_GET['genderSelection-female'])) {
        $gender = "female";
        $find = $_GET['contact'];
        $injury = $_GET['injury'];
        $condition = $_GET['condition'];
        $massbefore = $_GET['massbefore'];
        $masstype = $_GET['masstype'];
        $arom = $_GET['armon'];

        $query = "INSERT INTO client (client_fname, client_lname, client_email, client_passwd, 
                            client_address, client_dob, client_gender, client_home, 
                            client_mobile, admin_id) 
                    VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $passwd . "','" . 
                                $address . "', '" . $dob . "', '" . $gender . "', '" . $home . "', '" . $mobile . "', '1')";

        $result = mysqli_query($con, $query);

        if (mysqli_query($con, $query)) {
            $last_id = mysqli_insert_id($con);
        }

        $query = "INSERT INTO questionnaire (q_find, q_injuries, q_health, q_massage, q_type, client_id, admin_id)
                    VALUES ('" . $find . "','" . $injury . "','" . $condition . "','" . $massbefore . "','" . $masstype . "','" . $arom . "','" . $last_id . "',1)";

        $result = mysqli_query($con, $query);


    } else if (isset($_GET['genderSelection-male'])) {
        $gender = "male";

        $query = "INSERT INTO client () 
                    VALUES (client_fname, client_lname, client_email, client_passwd, client_address, client_dob, client_gender, client_home, client_mobile, admin_id) 
            VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $passwd . "','" . $address . "', '" . $dob . "', '" . $gender . "', '" . $home . "', '" . $mobile . "', '1')";

        $result = mysqli_query($con, $query);
        
    }

    mysqli_close($con);

?>

