<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
      <title>Send Reset Password Link with Expiry Time in PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="shortcut icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
    <link rel="icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
    <title>Prodigy Studio</title>
</head>
<body>
    




<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = md5($_POST['password']);
$query = mysqli_query($conn,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
echo '<h1 class="text-center mt-5">Congratulations! Your password has been updated successfully. <br><br> <a href="signin.php" class="btn btn-primary">Return to Sign In Page </a></h1>';
}else{
echo "<h1 class='text-center mt-5'>Something goes wrong. Please try again</p>";
}
}
?>
<h3 class='text-sm-right fixed-bottom mr-3'>© Prodigy Studio </h3>
</body>
</html>