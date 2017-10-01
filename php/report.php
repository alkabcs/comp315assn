<?php

$fromdate = $_GET["fromdate"];
$todate = $_GET["todate"];

if(isset($fromdate) && isset($todate)){
  getreport($fromdate, $todate);
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

 function getreport($fromdate, $todate){

   $query = "SELECT t.treat_type as `Service`, t.treat_fee as `Rate`, COUNT(t.treat_fee) as `Quantity`, ROUND(SUM((t.treat_fee * .15)), 2) as `Taxes`, " . "
			ROUND(SUM((t.treat_fee * 1.15)), 2) as `Total` from treatment t join appointment a on a.treat_id = t.treat_id WHERE " . 
			"a.appt_paid = 1 and a.appt_date between STR_TO_DATE('" . $fromdate . "', '%d/%m/%Y') and STR_TO_DATE('" . $todate 
			. "', '%d/%m/%Y') group by t.treat_type, t.treat_fee";
	$conn = opendb();

	 $result = mysqli_query($conn, $query) or die ('error query failed accessing data');
	
	echo "<table id=\"client_list\">
		<tr>
		<th>Service</th>
		<th>Rate</th>
		<th>Quantity</th>
		<th>Taxes</th>
		<th>Total</th>
		</tr>";
		$totalpaid = 0;

	while($row = mysqli_fetch_assoc($result)) {
		$Service = $row['Service'];
		$Rate    = $row['Rate'];
		$Quantity = $row['Quantity'];
		$Taxes    = $row['Taxes'];
		$Total    = $row['Total'];

		echo "<tr>";
		echo "<td>" . $Service . "</td>";
		echo "<td>" . $Rate . "</td>";
		echo "<td>" . $Quantity . "</td>";
		echo "<td>" . $Taxes . "</td>";
		echo "<td>" . $Total . "</td>";
		echo "</tr>";
		$totalpaid++;
	}
	echo "</table> &" . $totalpaid;

	mysqli_close($con);
 
 }

?>