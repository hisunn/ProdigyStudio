<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
$username = $_SESSION['username'];
$registered_event = $_POST['registered_event'];
$registered_user = $_POST['registered_user'];
$total_profit = $_POST['total_profit'];
$total_ticket = $_POST['total_ticket'];

$query = "SELECT events.title AS title, events.organizer AS organizer, events.dates AS dates, ticket.price AS price, events.event_status AS event_status FROM events INNER JOIN ticket ON events.event_id = ticket.event_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    $filename = "admin_export.csv";
    $delimiter = ";";
    $f = fopen('php://memory', 'w');
   
    $header = array("Event name","Event Organizer","Event Date","Ticket Price (RM)","Event Status");
    fputcsv($f, $header);

    foreach ($result as $line) {       
        fputcsv($f, $line);
    }
    $header = array("","","","");
    fputcsv($f, $header);
    $header = array("Total Event Registered","Total User Registered","Total Profit Made by Events (RM)","Total Ticket Sold");
    fputcsv($f, $header);
    $header = array($registered_event,$registered_user,$total_profit,$total_ticket);
    fputcsv($f, $header);
    
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: text/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
