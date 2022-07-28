<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once '../../vendor/autoload.php';
if (isset($_POST['password-reset-token']) && $_POST['email']) {
  include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
  $emailId = $_POST['email'];
   $token = md5($emailId) . rand(10, 9999);
    $expFormat = mktime(
      date("H"),
      date("i"),
      date("s"),
      date("m"),
      date("d") + 1,
      date("Y")
    );
    $expDate = date("Y-m-d H:i:s", $expFormat);
    $update = mysqli_query($conn, "UPDATE users SET  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 $link = "https://prodigystudio.live/reset-password.php?key=" . $emailId . "&token=" . $token;
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "admin@prodigystudio.live";
$to = $emailId;
$subject = "Reset Forgot Password (Prodigy Studio)";
$message = "Hi, please click this link to reset your password. Thank you ".$link;
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    header('location:forgotpwd.php?success=true');
} else {
    header('location:forgotpwd.php?success=false');
}
  
}
