<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password In PHP MySQL</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
    <link rel="icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
    <title>Prodigy Studio</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Reset your Password 
            </div>
            <div class="card-body">
                <?php
                if ($_GET['key'] && $_GET['token']) {
                    include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
                    $email = $_GET['key'];
                    $token = $_GET['token'];
                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "';"
                    );
                    $curDate = date("Y-m-d H:i:s");
                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_array($query);
                        if ($row['exp_date'] >= $curDate) { ?>
                            <form action="update-forget-password.php" method="post">
                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                <input type="hidden" name="reset_link_token" value="<?php echo $token; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name='password' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" name='cpassword' class="form-control">
                                </div>
                                <input type="submit" name="new-password" class="btn btn-primary">
                            </form>
                <?php }
                    } else {
                        echo "<h1 class='text-center'>This forget password link has been expired</1>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <h3 class='text-sm-right fixed-bottom mr-3'>© Prodigy Studio </h3>
</body>

</html>