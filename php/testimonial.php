<?php
		require_once('opendb.php');

		$query = "select c.client_fname, testimonial_text from testimonial t " . 
		" join client c on c.client_id = t.client_id WHERE t.Active = 1";

		$conn = opendb();
	 
		$result = mysqli_query($conn, $query) or die ('error query failed accessing data');

		$first = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$client_name = $row['client_fname'];
			$testimonial   = $row['testimonial_text'];

			if($first == 0){
				echo '<div class="active item"><blockquote><p>';
			}
			else{
				echo '<div class="item"><blockquote><p>';
			}

			echo $testimonial . '</p><p> - ' . $client_name . '</p></blockquote>'
			. '<div class="profile-circle" style="background-color: rgba(0,0,0,.2);"></div></div>';
			$first++;
		}
		mysqli_close($con);
?>