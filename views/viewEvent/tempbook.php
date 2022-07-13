<?php

use module\viewEvents\viewEvents\viewEvents\viewEvents;

include "../Template/header.php";
if (empty($_SESSION['username'])) {
    // header('location:../Registration/register.php?user=ticketer');
    echo "<script>location.href='../Registration/register.php?user=ticketer'</script>";
}
require "../../DB/db.php";
include "../../module/viewEvents/viewEvents.php";
$_event = new viewEvents();
$event = $_event->displayTicketDetail($_GET['eid']);
$ticket = $_event->displayTicketInfo($_GET['eid']);
$user = $_event->retrieveUser($_SESSION['username']);

// if (isset($_SESSION['username']) == null) {

//     header('location:../Registration/register.php');
// }   
foreach ($user as $user) {
    $username = $user['username'];
    $firstname = $user['first_name'];
    $lastname = $user['last_name'];
    $email = $user['email'];

    //    echo $username;
}


foreach ($ticket as $ticket) {
    $ticketname = $ticket['ticketname'];
    $quantity = $ticket['quantity'];
    $max = $ticket['max'];
    $price = $ticket['price'];
    $quantity_left = $ticket['quantity_left'];
}


?>


<div class="my-36">
    <form action="../../module/payment/generate-gateway-payment-call.php" method="post">

        <input name="username" type="text" hidden value="<?= $username ?>">
        <input name="event_id" type="text" hidden value="<?= $_GET['eid'] ?>">
        <input name="totalprice" type="text" hidden value="<?= $price ?>">
        <input name="quantity" type="text" hidden value="<?= $quantity ?>">
        <input name="quantity_left" type="text" hidden value="<?= $quantity_left ?>">

        <div x-data="{sliderMax:0,slider1:0,slider2:0,slider3:0,slider4:0,slider5:0,}" class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
            <?php
            if (!empty($event)) {
                foreach ($event as  $row) : ?>
                    <div class="max-w-md mx-auto flex">
                        <div class="divide-y divide-gray-300/50 relative right-36">
                            <div class="py-8 text-base leading-7 space-y-6 text-gray-600 w-96">
                                <h1 class="text-2xl"><b><?= $row['title'] ?></b></h1>
                                <input name="title" type="text" hidden value="<?= $row['title'] ?>">
                                <hr>
                                <h2 class="text-base"><b>Ticket Name: </b><?= $row['ticket_name'] ?></h2>
                                <h2 class="text-base"><b>Event time and date: </b><?= $row['slots'] ?> , <?= $row['dates'] ?></h2>
                                <h2 class="text-base"><b>Venue: </b>Prodigy Studio, <?= $row['locations'] ?></h2>
                                <input name="location" type="text" hidden value="<?= $row['locations'] ?>">
                                <h2 class="text-base"><b>Admission fee: </b>RM <?= $row['ticket_price'] ?> </h2>
                                <h2 class="text-base"><b>Ticket(s) Available: </b><?= $quantity_left ?></h2>
                                <h2 class="text-base"><b>Ticket Amount: </b><?php if ($max == '1') {
                                                                                echo "1";
                                                                            } ?> </h2>
                                <?php
                                if ($quantity_left <= 5) {
                                    $max = $quantity_left;
                                }

                                if ($max == '5') { ?>
                                    <input x-model="slider5" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity_input" type="range" min="1" max="5" value="1">
                                    <input x-model="slider5" type="text" class="w-6 border-2 text-center rounded-md" disabled>
                                <?php } elseif ($max == '4') { ?>
                                    <input x-model="slider4" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity_input" type="range" min="1" max="4" value="1">
                                    <input x-model="slider4" type="text" x-model="" class="w-6 border-2 text-center rounded-md" disabled>
                                <?php } elseif ($max == '3') { ?>
                                    <input x-model="slider3" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity_input" type="range" min="1" max="3" value="1">
                                    <input type="text" x-model="slider3" class="w-6 border-2 text-center rounded-md" disabled>
                                <?php } elseif ($max == '2') { ?>
                                    <input x-model="slider2" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity_input" type="range" min="1" max="2" value="1">
                                    <input type="text" x-model="slider2" class="w-6 border-2 text-center rounded-md" disabled>
                                <?php
                                } elseif ($max == '1') {
                                    echo ""; ?>
                                    <input hidden x-model="slider2" required class="w-5/6 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" id="" name="quantity_input" type="range" min="1" max="1" value="1">
                                    <input hidden type="text" x-model="slider2" class="w-6 border-2 text-center rounded-md" disabled>
                                <?php                  }

                                ?>
                                <h2 class="text-base"><b>Contact information: </b></h2>
                                <p>Name :</p>
                                <input required class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="eventtitle" name="name" type="text" placeholder="AlibinAbu">
                                <p>Email :</p>
                                <input required class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="eventtitle" name="email" type="text" placeholder="AlibinAbu@email.com">
                                <p>Phone No :</p>
                                <input required class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" maxlength="10" id="phonenumber" name="phonenumber" type="text" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" placeholder="0123456789">
                                <h2 class="text-base"><b>Payment method: </b> ToyyibPay</h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-end relative -bottom-4 right-10 ">
                        <!-- redirect dri toyib kesini ../viewTicket/ticketlist.php -->
                        <?php 
                        if($quantity_left != '0'){ ?>
                            <button type="submit" name="ticket_btn" class="cursor-pointer text-center w-96 px-5 py-3 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none max-w-xs">BUY TICKET</button>
                   <?php     }else{ ?>
                     <button disabled type="button" name="ticket_btn" class="cursor-pointer text-center w-96 px-5 py-3  bg-gray-200 border-gray-300 text-white rounded transition duration-300  focus:outline-none max-w-xs">SOLD OUT</button>
                 <?php  } ?>
                       
                        
                    </div>
            <?php endforeach;
            } ?>
        </div>
    </form>

</div>



<?php
include "../Template/footer.php";
?>