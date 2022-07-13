<?php

namespace  module\viewTickets\viewTickets\viewTickets;

class viewTickets
{
    public function displayTicketList($username)
    {
        include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
        $query = "SELECT events.title AS title, events.locations AS locations, ticketreceipt.paid_on AS paid_on,ticketreceipt.event_id AS eid FROM events INNER JOIN ticketreceipt ON events.event_id = ticketreceipt.event_id WHERE ticketreceipt.username = '$username' ";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
