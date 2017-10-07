<?php

	function opendb()
	{

		 $servername  = 'localhost';
		 $username = 'root';
		 $password = 'root';
		 $dbname = 'wellness_clinic';

		 $conn = mysqli_connect($servername, $username, $password, $dbname);
		 if ($conn->connect_errno > 0) {
			 die('Unable to connect to database ['.$conn->connect_errno.']');
		 }
		 return $conn;
	}
?>