<?php  
require_once('../PHPMailer/PHPMailer.php');


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
// some change
    return $conn;
}

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

?>