    <?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    require_once '../../vendor/autoload.php';
    $event_title = $_POST['event_title'];
    $event_id = $_POST['event_id'];
    $transaction_id = $_POST['transaction_id'];
    $status_id = $_POST['status_id'];
    $billcode = $_POST['billcode'];
    $order_id = $_POST['order_id'];
    $msg = $_POST['msg'];
    $total_paid = $_POST['total_paid'];
    $quantity = $_POST['quantity'];

    if (isset($_POST['receipt_btn'])) {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->curlAllowUnsafeSslRequests = true;
        $stylesheet = file_get_contents('cuba.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $data .= '<h1 class="text-3xl text-center" style="font-family:Times New Roman;"><b>Prodigy Studio</b></h1> <br>';
        $data .= '<h1  style="font-family: Harlow Solid Italic;font-size:x-large;"><b>Payment Receipt</b></h1>';
        $data .= '<hr>';
        $data .= '<div style=" border: 1px solid gray;
        border-radius: 5px;"><br>';
        $data .= '<table style="margin-left:5px;">
        <tr>
        <td>Event Title</td>
        <td>: ' . $event_title . '</td>
        </tr>
        <tr>
            <td>Event id</td>
            <td>: ' . $event_id . '</td>
        </tr>
        <tr>
            <td>Bill Code</td>
            <td>: ' . $billcode . '</td>
        </tr>       
        <tr>
            <td>Reference No</td>
            <td>: ' . $transaction_id . '</td>
        </tr>
        <tr>
        <td>Total Paid</td>
        <td>: RM ' . $total_paid . '</td>
        </tr>
        <tr>
            <td>Transaction Time</td>
            <td>: ' . date("Y-m-d") . " " . date("h:i:sa") . '</td>
        </tr>
       
        <tr>
            <td>Quantity</td>
            <td>: '. $quantity . '</td>
        </tr>

    </table>';
        $data .= '<p style="margin-left:5px;">Payment via: ToyyibPay</p>';
        $data .= '<img style="margin-left:150px"; alt="CatReceiptEvent" width="400" src="../../Img/CatTicketReceipt.jpg">';
        $data .= '</div>';
        $data .= '<h1 style="font-family: sans-serif; font-size:large;"><b>Thank you for booking with Prodigy Studio</b></h1>';
        $data .= '<p style="position: absolute;
        bottom: 0;
        right: 0;"><b> ©️ Prodigy Studio</b></p>';



        $mpdf->WriteHTML($data);
        $mpdf->Output("ticketreceipt.pdf", 'D');
    }
    

