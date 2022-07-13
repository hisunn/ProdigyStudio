<?php

use module\viewEvents\viewEvents\viewEvents\viewEvents as ViewEvents;

require "../module/viewEvents/viewEvents.php";



if (isset($_GET['page'])) {

    if ($_GET['page'] == 'finished') {

        $username = $_GET['username'];
        $event_id = $_GET['eid'];
        $event_title = $_GET['title'];
        $transaction_id = $_GET['transaction_id'];
        $billcode = $_GET['billcode'];
        $order_id = $_GET['order_id'];
        $status_id = $_GET['status_id'];
        $msg = $_GET['msg'];
        $price = $_GET['price'];
        $quantity =  $_GET['quantity'];
        $quantity_left =  $_GET['quantity_left'];
        $quantity_input = $_GET['quantity_input'];

        if($status_id == '3'){
        header('location:../views/viewTicket/ticketlist.php');
        die();
       }

        $ticket = new viewEvents();
        $ticket->updateTicketQuantity($quantity, $quantity_left, $quantity_input, $event_id);
        $ticket->insertTicketProfit($quantity, $quantity_input, $event_id);
        $ticket->insertTicketProfitByMonth($quantity, $quantity_input, $event_id);
        $ticket->insertReceipt($event_id, $transaction_id, $billcode, $order_id, $status_id, $price, $username,$quantity_input);
        header('location:../views/viewTicket/receipt.php?eid=' . $event_id);
    }
}



