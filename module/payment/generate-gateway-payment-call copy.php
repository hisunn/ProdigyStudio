<?php

if (isset($_POST['save_btn4'])) { 

  $event_id = $_POST['event_id'];
  $nama = $_POST['name'];
  $email = $_POST['email'];
  $telefon = $_POST['phonenumber'];
  $harga = $_POST['totalprice'];
  $title = $_POST['title'];
  $location = $_POST['location'];
  $slot = $_POST['slot'];
  $date = $_POST['date'];

  if ($slot == 'Slot2') {
    $slot = "Regular Slot";
  }

  $rmx100 = $harga * 100;
  $some_data = array(
    'userSecretKey' => 'v9jprht6-77xg-afiy-rpc8-h5au740ewbgl',
    'categoryCode' => '4mfdc9w0',
    'billName' => 'Prodigy Studio Event Booking',
    'billDescription' => 'Event booking for ' . $title . ' event @ ' . $location . ' with total price of RM' . $harga,
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $rmx100,
    'billReturnUrl' => 'https://prodigystudio.live/controller/manageEventController.php?page=finished&eid=' . $event_id . '&title=' . $title . '&price=' . $harga,
    'billCallbackUrl' => '',
    'billExternalReferenceNo' => '',
    'billTo' => $nama,
    'billEmail' => $email,
    'billPhone' => $telefon,
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
  );

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);
  curl_close($curl);
  $obj = json_decode($result, true);
  $billcode = $obj[0]['BillCode'];


  if ($billcode == null) {
    echo "ERROR ENCOUNTERED";
    header('location:../../views/manageEvent/eventcreation.php?page=payment&eid=' . $event_id . '&error=1');
  }
}

if (isset($_POST['ticket_btn'])) {
  $username = $_POST['username'];
  $event_id = $_POST['event_id'];
  $nama = $_POST['name'];
  $email = $_POST['email'];
  $telefon = $_POST['phonenumber'];
  $harga = $_POST['totalprice'];
  $title = $_POST['title'];
  $location = $_POST['location'];
  $quantity = $_POST['quantity'];
  $quantity_left = $_POST['quantity_left'];
  $quantity_input = $_POST['quantity_input'];

  $rmx100 = ($harga*$quantity_input) * 100;
  $some_data = array(
    'userSecretKey' => 'v9jprht6-77xg-afiy-rpc8-h5au740ewbgl',
    'categoryCode' => 'ytq6cpx4',
    'billName' => 'Prodigy Studio Ticket Booking',
    'billDescription' => 'Ticket booking for ' . $title . ' event @ ' . $location . ' with total price of RM' . $harga,
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $rmx100,
    'billReturnUrl' => 'https://prodigystudio.live/controller/viewEventController.php?page=finished&eid=' . $event_id . '&title=' . $title . '&price=' . $harga*$quantity_input.'&username='.$username.'&quantity='.$quantity .'&quantity_left='.$quantity_left.'&quantity_input='.$quantity_input,
    'billCallbackUrl' => '',
    'billExternalReferenceNo' => '',
    'billTo' => $nama,
    'billEmail' => $email,
    'billPhone' => $telefon,
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
  );

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);
  curl_close($curl);
  $obj = json_decode($result, true);
  $billcode = $obj[0]['BillCode'];


  if ($billcode == null) {
    echo "ERROR ENCOUNTERED";
    header('location:../../views/manageEvent/eventcreation.php?page=payment&eid=' . $event_id . '&error=1');
  }
}
?>

<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
  //redirect to payment gateway
  window.location.href = "https://dev.toyyibpay.com/<?= $billcode ?>";
</script>