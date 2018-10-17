<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIP</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url ('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url ('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin.css');?>" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center>Login</center></div>
      <div class="card-body">
        <form action="Login" method="POST">
          <div class="form-group">
            <label for="txt_user">Username</label>
            <input class="form-control" id="txt_user" name="txt_user" type="text" placeholder="Username" autofocus="">
          </div>
          <div class="form-group">
            <label for="txt_pass">Password</label>
            <input class="form-control" id="txt_pass" name="txt_pass" type="password" placeholder="Password">
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="btn_log" value="Login">
          <!-- <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
        </form>
        <!-- <div class="text-center"> 
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
