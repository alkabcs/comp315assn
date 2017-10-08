<?php  
require '../lib/PHPMailerAutoload.php';
require_once('opendb.php');

$mail = new PHPMailer();				
$mail->isSMTP();
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML(true);
$mail->Username = 'wellnessclinicad@gmail.com';
$mail->Password = '1234xyza';
$mail->setFrom('wellnessclinicad@gmail.com', 'Wellness Clinic');

$appt_ids = $_GET["apptids"];

		if(isset($appt_ids)){

		//echo $appt_ids;
		$client_id_array = json_decode($appt_ids, true);

		$conn = opendb();

		foreach($client_id_array as $key=>$val)
		{
			//echo $val['appt_id']; //->name . "\n";

			$row_record = array();
			$query = "SELECT c.client_fname, c.client_email, a.appt_date, a.appt_start_time, a.appt_end_time," .
					" t.treat_type, a.Confirmed FROM `appointment` a " .
					" join client c on c.client_id = a.client_id " .
					" join treatment t on t.treat_id = a.treat_id " .
					" WHERE appt_id =" . $val['appt_id'];	

			$result = mysqli_query($conn, $query) or die ('error query failed accessing data');
	
			while ($num_rows = mysqli_fetch_row($result)) {
				$row_record[] = $num_rows;
			}

			if(sizeof($row_record) > 0){

				$first_rec =  $row_record[0];

				if($val['confirmed'] != $first_rec[6]){
					
					try{
						$confirm = 1;
						if($first_rec[6] == 1){
							$confirm = 0;
						}
						$updatequery = "update appointment set Confirmed = " . $confirm . 
										" WHERE appt_id = " . $val['appt_id'];

						mysqli_query($conn, $updatequery);

						$mail->Subject = 'Your Appointment with Wellness Clinic';	
						
						$body = "";
						if($first_rec[6]){						
							$body = "Your appointment on " . $first_rec[2] . " from " .
							$first_rec[3] . " to " . $first_rec[4] .
							" has been cancelled.";
						}
						else{
							$body = "Thank you for booking.<br>Your appointment on " . $first_rec[2] . " from " .
							$first_rec[3] . " to " . $first_rec[4] .
							" has been confirmed for treatment " .
							$first_rec[5] . ". Looking forward to seeing you. " ;						
						}
		
						$mail->Body = $body;
					
						$mail->addAddress($first_rec[1]);
						$mail->send();
					
					}catch (Exception $e) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}					
				}				
			}
		} 
		echo ' Message has been sent';
		mysqli_close($con);	
	}

/*
function get_admin_email(){

    $row_record = array();
    $query = "select * from wellness_clinic.admin";
    $conn = opendb();

    $result = mysqli_query($conn, $query) or die ('error query failed accessing data');
 
    while ($num_rows = mysqli_fetch_row($result)) {
        $row_record[] = $num_rows;
    }  
    if(sizeof($row_record) > 0){
       return $row_record[0];
    }
}

function send_booking_email_to_admin($clientemail, $clientname, $datetime, 
$treatment){
    $admin_record = get_admin_email();

    if($admin_record){
        $adminemail = $admin_record[2];

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;  
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'wellnessclinicad@gmail.com';
        $mail->Password = '1234xyza';
        $mail->Subject = '';
        $mail->Body = 'Hi Jo, ' . $clientname . 'has requested a booking on '
            .  $datetime . ' for treatment ' .  $treatment . '. Please reply to '
            . 'the email ' . $clientemail . ' provided by ' . $clientname;
        $mail->AddAddress($adminemail);

        $mail->Send();
    }
}
*/
?>