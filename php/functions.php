<?php
    include_once('xyz.php');
    
    date_default_timezone_set("NZ");

    function connection() {
        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        if ($conn->connect_errno > 0) {
            die('Unable to connect to database ['.$conn->connect_errno.']');
        }

        return $conn;
    }

    $con = connection();
?>