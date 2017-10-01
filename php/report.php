<?php

$fromdate = $_REQUEST["fromdate"];
$todate = $_REQUEST["todate"];

if(isset($fromdate) && isset($todate)){
  getreport();
}
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

 function getreport(){

   $query = "SELECT t.treat_type as `Service`, COUNT(t.treat_fee) as `Quantity`, SUM((t.treat_fee * .15)) as `Taxes`, " . "
			SUM((t.treat_fee * 1.15)) as `Total` from treatment t join appointment a on a.treat_id = t.treat_id WHERE " . 
			"a.appt_paid = 1 and a.appt_date between '" . $fromdate. " 00:00:00' and '" . $todate . 
			" 00:00:00' group by t.treat_type";

	$conn = opendb();

	 $result = mysqli_query($conn, $query) or die ('error query failed accessing data');

	echo "<table id=\"client_list\">
		<tr>
		<th>Service</th>
		<th>Quantity</th>
		<th>Taxes</th>
		<th>Total</th>
		</tr>";

	while($row = mysqli_fetch_assoc($result)) {
		$Service      = $row['Service'];
		$Quantity    = ucfirst($row['Quantity']);
		$Taxes    = ucfirst($row['Taxes']);
		$Total    = strtolower($row['Total']);

		echo "<tr>";
		echo "<td id = " . $Service . ">" . $id . "</td>";
		echo "<td><a href='javascript:client_load()'>" . $Quantity . "<a/></td>";
		echo "<td>" . $Taxes . "</td>";
		echo "<td>" . $Total . "</td>";
		echo "</tr>";
	}

	mysqli_close($con);
 
 }

?>