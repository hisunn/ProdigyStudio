<!doctype html>
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
       <a href='signin.php' class='btn btn-primary mt-2 ml-2'>Back <i class="bi bi-arrow-left-circle"></i></a>
      <div class="container mt-5">
          <div class="card">
            <div class="card-header text-center">
              Send Reset Password 
            </div>
            <div class="card-body">
              <form action="password-reset-token.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
      
      
      <?php if(isset($_GET['success'])){
      
      if($_GET['success'] == 'true'){
          
          echo "<h2 class='text-center mt-5'>Reset password email had been sent</h2>";
          
      }if($_GET['success'] == 'false'){
          echo "<h2 class='text-center mt-5'>There seems to be a problem . . . <br> please check email address  </h2>";
      }
      } ?>
      
      
      <h3 class='text-sm-right fixed-bottom mr-3'>© Prodigy Studio </h3>
 
   </body>
</html>