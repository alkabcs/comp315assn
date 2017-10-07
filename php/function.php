<?php
require_once('opendb.php');
// testing commits to remote origin
$fromdate = $_GET["fromdate"];
$todate = $_GET["todate"];
$bool = $_GET["bool"];
$report = $_GET["report"];
$schedule = $_GET["schedule"];
if(isset($fromdate) && isset($todate)){

	if(isset($report)){
		getreport($fromdate, $todate, $bool);
	}
	else if(isset($schedule)){
		getschedule($fromdate, $todate, $bool);
	}
}

 function getschedule($fromdate, $todate, $Confirmed){

   $query = "select CONCAT(c.client_fname, ' ', c.client_lname) as `cname`, a.appt_date, a.appt_start_time, " .
			"  a.appt_end_time, t.treat_type, a.client_id, a.Confirmed " . 
			" from appointment a  " . 
			" join client c on c.client_id = a.client_id " . 
			" join treatment t on t.treat_id = a.treat_id  WHERE " . 
			"a.Confirmed = " . $Confirmed . 
			" and a.appt_date between STR_TO_DATE('" . $fromdate . "', '%d-%m-%Y') " . 
			" and STR_TO_DATE('" . $todate . "', '%d-%m-%Y')";

			$conn = opendb();

	 $result = mysqli_query($conn, $query) or die ('error query failed accessing data');
	
	echo "<table id=\"client_list\">
		<tr>
		<th>Confirmed</th>
		<th>Name</th>
		<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Treatment</th>
		</tr>";
		$totalappt = 0;

	while($row = mysqli_fetch_assoc($result)) {
		$name = $row['cname'];
		$date    = $row['appt_date'];
		$start_time    = $row['appt_start_time'];
		$end_time = $row['appt_end_time'];
		$treat_type    = $row['treat_type'];

		echo "<tr>";
		if($Confirmed != 1){
			//<input id="checkBox" type="checkbox">
			echo '<td><input id="checkBox" type="checkbox"></td>';
		}
		else{
		echo '<td><input id="checkBox" type="checkbox" checked></td>';
		}
		
		echo "<td>" . $name . "</td>";
		echo "<td>" . $date . "</td>";
		echo "<td>" . $start_time . "</td>";
		echo "<td>" . $end_time . "</td>";
		echo "<td>" . $treat_type . "</td>";
		echo "</tr>";
		$totalappt++;
		
	}
	echo "</table> &" . $totalappt;

	mysqli_close($con);
 
 }

 function getreport($fromdate, $todate, $paid){

   $query = "SELECT t.treat_type as `Service`, t.treat_fee as `Rate`, COUNT(t.treat_fee) as `Quantity`, " .
			" ROUND(SUM((t.treat_fee * .15)), 2) as `Taxes`, " . 
			"ROUND(SUM((t.treat_fee * 1.15)), 2) as `Total`, COALESCE(d.disc_name, 'None') as `Discount`, " . 
			" COALESCE(d.disc_price, 0) as `disc_price` " .
			" from treatment t " . 
			" join appointment a on a.treat_id = t.treat_id " . 
			" left join discount d on d.disc_id = a.disc_id  WHERE " . 
			"a.appt_paid = " . $paid . 
			" and a.appt_date between STR_TO_DATE('" . $fromdate . "', '%d-%m-%Y') " . 
			" and STR_TO_DATE('" . $todate . "', '%d-%m-%Y') group by t.treat_type, t.treat_fee, d.disc_price";

			$conn = opendb();

	 $result = mysqli_query($conn, $query) or die ('error query failed accessing data');
	
	echo "<table id=\"client_list\">
		<tr>
		<th>Service</th>
		<th>Rate</th>
		<th>Discount</th>
		<th>Quantity</th>
		<th>Taxes</th>
		<th>Total</th>
		</tr>";
		$totalpaid = 0;

	while($row = mysqli_fetch_assoc($result)) {
		$Service = $row['Service'];
		$Rate    = $row['Rate'];
		$Discount    = $row['Discount'];
		$Quantity = $row['Quantity'];
		$Taxes    = $row['Taxes'];
		$Total    = $row['Total'] - ($row['Total'] * ($row['disc_price'] / 100));

		echo "<tr>";
		echo "<td>" . $Service . "</td>";
		echo "<td>" . $Rate . "</td>";
		echo "<td>" . $Discount . "</td>";
		echo "<td>" . $Quantity . "</td>";
		echo "<td>" . $Taxes . "</td>";
		echo "<td>" . $Total . "</td>";
		echo "</tr>";
		if($paid == 1){
			$totalpaid += $Total;
		}
		
	}
	echo "</table> &" . $totalpaid;

	mysqli_close($con);
 
 }

?>