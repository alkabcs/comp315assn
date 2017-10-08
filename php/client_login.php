<?php
    include_once('functions.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_COOKIE['username'] = $username;

    $query = "SELECT * FROM client";

    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)) {
        $username_found = $row['client_email'];
        $username_found = $row['client_passwd'];
    }

    if($password_found == $password) {
        include('../client_home.php');
    } else {
        header('Location: ../index.html');
    }

    mysqli_close($con);

?>