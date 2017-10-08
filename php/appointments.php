<?php
    include_once('functions.php');

    $query = "SELECT    a.appt_id, a.appt_date, a.appt_start_time, a.appt_end_time, a.appt_paid, 
                        t.treat_type, c.client_fname, c.client_lname 
                        From appointment a 
                        INNER JOIN client c 
                            ON a.client_id=c.client_id 
                        INNER JOIN treatment t 
                            ON a.treat_id=t.treat_id
                        WHERE a.appt_date 
                            BETWEEN CURDATE() 
                            AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
                        ORDER BY a.appt_date ASC";

    $result = mysqli_query($con, $query);

    echo "<table id='client_list'>
            <caption>Appointments for the Week</caption>
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Paid</th>
                <th>Client Name</th>
                <th>Treatment Type</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        $id         = $row['appt_id'];
        $date       = $row['appt_date'];
        $start      = $row['appt_start_time'];
        $end        = $row['appt_end_time'];
        $paid       = $row['appt_paid'];
        //$discount   = $row['d.disc_price']
        $client     = ucfirst($row['client_fname']) . " " . ucfirst($row['client_lname']);
        $treatment  = $row['treat_type'];

        echo "<tr class='appointments' onclick='javascript:appointment_load()' id='" . $id . "'>";
        echo    "<td>" . date("D j M", strtotime($date)) . "</td>";
        echo    "<td>" . date("g:i a", strtotime($start)) . "</td>";
        echo    "<td>" . date("g:i a", strtotime($end)) . "</td>";
        echo    "<td>" . $paid . "</td>";
        //echo    "<td>" . $discount . "</td>";
        echo    "<td>" . $client . "</td>";
        echo    "<td>" . $treatment . "</td>";
        echo "</tr>";
    }

    mysqli_close($con);
?>