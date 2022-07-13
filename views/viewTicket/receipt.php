<?php
include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
include "../Template/header.php";

date_default_timezone_set("Asia/Kuala_Lumpur");

include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
$id = $_GET['eid'];

$query = "SELECT ticketreceipt.transaction_id AS transaction_id,ticketreceipt.billcode AS billcode,ticketreceipt.order_id AS order_id,ticketreceipt.status_id AS status_id,ticketreceipt.paid_on AS paid_on,ticketreceipt.total_paid AS total_paid,ticketreceipt.quantity AS quantity ,events.title AS title FROM ticketreceipt INNER JOIN events ON ticketreceipt.event_id = events.event_id WHERE ticketreceipt.event_id = '$id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


        $title = $row['title'];
        $transaction_id = $row['transaction_id'];
        $status_id = $row['status_id'];
        $billcode = $row['billcode'];
        $order_id = $row['order_id'];
        $total_paid = $row['total_paid'];
        $paid_on =  $row['paid_on'];
        $quantity = $row['quantity'];
        // date("Y-m-d",$row['paid_on']) . " " . date("h:i:sa",$row['paid_on']) ;
        // $msg = $_GET['msg'];
    }
}
?>


<form action="printreceipt.php" method="POST">
    <input name="event_title" hidden type="text" value="<?= $title ?>">
    <input name="event_id" hidden type="text" value="<?= $id ?>">
    <input name="transaction_id" hidden type="text" value="<?= $transaction_id ?>">
    <input name="status_id" hidden type="text" value="<?= $status_id ?>">
    <input name="billcode" hidden type="text" value="<?= $billcode ?>">
    <input name="order_id" hidden type="text" value="<?= $order_id ?>">
    <input name="msg" hidden type="text" value="<?= $msg ?>">
    <input name="total_paid" hidden type="text" value="<?= $total_paid ?>">
    <input name="quantity" hidden type="text" value="<?= $quantity ?>">

    <div class="mt-16">
        <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-2  ring-indigo-300 ring-gray-900/5 max-w-4xl sm:mx-auto sm:rounded-lg sm:px-10 ">
            <h1 class="text-3xl text-center" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Prodigy Studio</b></h1> <br>
            <h1 class="text-2xl" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Payment Receipt</b></h1>
            <hr>
            <div class="max-w-lg mx-auto flex">
                <div class="border-2 p-20 rounded-lg mt-5">
                    <h1 class="text-3xl text-center -mt-10 mb-8 font-extralight"><b><?= $title ?></b></h1> <br>
                    <table>
                        <tr>
                            <td>Event id</td>
                            <td>: <?= $id ?></td>
                        </tr>
                        <tr>
                            <td>Bill Code</td>
                            <td>: <?= $billcode ?></td>
                        </tr>
                        <tr>
                            <td>Reference No</td>
                            <td>: <?= $transaction_id ?></td>
                        </tr>
                        <tr>
                            <td>Total Paid</td>
                            <td>: RM <?= $total_paid ?></td>
                        </tr>
                        <tr>
                            <td>Transaction Time</td>
                            <td>: <?= $paid_on ?></td>
                        </tr>

                        <tr>
                            <td>Ticket Quantity</td>
                            <td>: <?= $quantity ?></td>
                        </tr>

                    </table> <br> <br>
                    <p>Payment via</p>
                    <img alt="toyyibPay" width="203" src="https://dev.toyyibpay.com/assets/img/icon/typ2022.png">
                    <img class="mt-3 -mb-20" alt="CatReceiptEvent" width="400" src="../../Img/CatTicketReceipt.jpg">

                </div>

            </div> <br>
            <h1 class="text-2xl text-center" style="font-family: 'Harlow Solid Italic', sans-serif;"><b>Thank you for booking with Prodigy Studio</b></h1>

        </div>
    </div>
    <div class="flex justify-center">
        <a href="ticketlist.php" name="" value="" class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition-all">
            Back to Ticket List
        </a>
        <button type="submit" name="receipt_btn" class="m-4 bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded transition-all">
            Print Receipt
        </button>
    </div>
</form>

<?php
include "../Template/footer.php";
?>