<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
$username = $_SESSION['username'];
$query = "SELECT title, locations, organizer,dates,event_status, event_id, slots FROM events WHERE created_by = '$username' ORDER BY uploaded_on DESC ";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    $filename = "export.csv";
    $delimiter = ";";
    $f = fopen('php://memory', 'w');

    $header = array("Event name","Venue","Organizer","Date","Status","Event ID","Event Slot");
    fputcsv($f, $header);

    foreach ($result as $line) {       
        fputcsv($f, $line);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: text/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
