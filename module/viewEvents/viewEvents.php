<?php

namespace  module\viewEvents\viewEvents\viewEvents;

class viewEvents
{

    public function insertTicketProfitByMonth($quantity_left, $quantity_input, $event_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $monthlyprofit = 0;
        $currentmonth = lcfirst(date("F"));
        $new_quantity = $quantity_left - $quantity_input;
        // collect username from events table
        $query = "SELECT created_by FROM events WHERE event_id = '$event_id' LIMIT 1;";
        $result = $conn->query($query);
        foreach ($result as $result) {
            $username = $result['created_by'];
        }
        // collect price and quantity left for profit calculation
        $query = "SELECT price,quantity_left FROM ticket WHERE event_id = '$event_id' LIMIT 1";
        $result = $conn->query($query);
        foreach ($result as $result) {
            $price = $result['price'];
            $quantity_left = $result['quantity_left'];
        }
        // calculate profit made and ticket sold for this event
        $ticketsold = $quantity_input;
        $profit = $ticketsold * $price;
        // collect month column from profitbymonth table
        $query = "SELECT $currentmonth FROM profitbymonth WHERE username = '$username' LIMIT 1";      
        $result = $conn->query($query);
        foreach ($result as $result) {
            $monthlyprofit = $result[$currentmonth];
        }
        $monthlyprofit =  $monthlyprofit + $profit;
        $query = "SELECT username FROM profitbymonth WHERE username = '$username' LIMIT 1;";
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $query = "UPDATE profitbymonth SET  $currentmonth = '$monthlyprofit'  WHERE username = '$username' LIMIT 1;";
            $result = $conn->query($query);
        } else {
            $query = "INSERT INTO profitbymonth (username,$currentmonth) VALUES ('$username','$monthlyprofit');";
            $result = $conn->query($query);
        }
        $conn->close();
    }


    public function insertTicketProfit($quantity, $quantity_input, $event_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $totalprofit = null;
        $totalticket = null;       
        $query = "SELECT price,quantity_left FROM ticket WHERE event_id = '$event_id' LIMIT 1";
        $result = $conn->query($query);
        foreach ($result as $result) {
            $price = $result['price'];
            $quantity_left = $result['quantity_left'];
        }      
        $ticketsold = $quantity_input;
        $profit = $ticketsold * $price;     
        $query = "SELECT created_by FROM events WHERE event_id = '$event_id' LIMIT 1;";
        $result = $conn->query($query);
        foreach ($result as $result) {
            $username = $result['created_by'];           
        }
        $query = "SELECT total_profit,total_ticket FROM profit WHERE username = '$username' LIMIT 1;";
        $result = $conn->query($query);
        foreach ($result as $result) {
            $totalprofit = $result['total_profit'];
            $totalticket = $result['total_ticket'];
        }       
        $totalprofit = $totalprofit + $profit;
        $totalticket =  $totalticket + $ticketsold;
        $query = "SELECT username FROM profit WHERE username = '$username ' LIMIT 1;";
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $query = "UPDATE profit SET total_profit=' $totalprofit',total_ticket='$totalticket' WHERE username = '$username'";
            $result = $conn->query($query);
        } else {
            $query = "INSERT INTO profit (total_profit,total_ticket, username) VALUES ('$totalprofit','$totalticket','$username');";
            $result = $conn->query($query);
        }
        $conn->close();
    }

    public function updateTicketQuantity($quantity, $quantity_left, $quantity_input, $event_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $new_quantity = $quantity_left - $quantity_input;
        $query = "UPDATE ticket SET quantity_left = '$new_quantity' WHERE event_id = '$event_id'";
        $result = $conn->query($query);
        $conn->close();
    }

    public function sortBySarangSeni1($sort)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT events.title AS title,events.descriptions AS descriptions,events.dates AS dates, events.slots AS slots,events.tag1 AS tag1,events.tag2 AS tag2,events.tag3 AS tag3, banners.file_name AS file_name, events.event_id AS event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_status = 'published' AND events.locations = 'Sangkar Seni 1';";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function retrieveUser($username)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT username, first_name, last_name, email FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function displayTicketInfo($id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT ticketname, quantity, max, price, quantity_left FROM ticket WHERE event_id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function displayEvents()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT banners.file_name, events.title,events.descriptions,events.tag1,events.tag2,events.tag3,events.event_id FROM events INNER JOIN banners ON events.event_id = banners.event_id  WHERE event_status = 'published' ORDER BY events.uploaded_on DESC LIMIT 3";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function displayEventDetails($event_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT events.title AS title,events.descriptions AS descriptions,events.slots AS slots,events.dates AS dates,events.locations AS locations, banners.file_name AS banners FROM events INNER JOIN banners ON events.event_id = banners.event_id WHERE events.event_id = '$event_id' ";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function displayTicketDetail($event_id)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "SELECT events.title AS title,events.descriptions AS descriptions,events.slots AS slots,events.dates AS dates,events.locations AS locations, ticket.ticketname AS ticket_name, ticket.quantity AS ticket_quantity, ticket.max AS ticket_max, ticket.price AS ticket_price FROM events INNER JOIN ticket ON events.event_id = ticket.event_id WHERE events.event_id = '$event_id' ";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insertReceipt($event_id, $transaction_id, $billcode, $order_id, $status_id, $price, $username,$quantity_input)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $query = "INSERT INTO ticketreceipt (event_id,transaction_id,billcode,order_id,status_id,total_paid,username,quantity) VALUES('$event_id','$transaction_id','$billcode','$order_id','$status_id','$price','$username','$quantity_input')";
        $conn->query($query);      
    }

    public function viewSearch($tempsearch)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/DB/db.php";
        $search = mysqli_real_escape_string($conn, $tempsearch);

        $query = "SELECT * FROM events WHERE title LIKE '$search%'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
