<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BoxOps | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
   <!-- meta name="viewport" content="width=device-width, initial-scale=1"-->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- atas -->
    <img src="<?=base_url()?>assets/dist/img/logogpi.png"
           alt="KomFreight"
           class="brand-image img-circle elevation-3"
           style="opacity: .8;width: 120px;height: 120px;">
     <br>
     <!-- <img src="<?=base_url()?>assets/dist/img/logogpi.png"
           alt="KomFreight"
           class="brand-image elevation-3"
           style="opacity: .8;width: 80px;height: 80px;">
      <br> -->
     <!-- end atas -->

     <!-- samping -->
     <!-- <img src="<?=base_url()?>assets/dist/img/logogpi.png"
           alt="KomFreight"
           class="brand-image img-circle elevation-3"
           style="opacity: .8;width: 30px;height: 30px;"> -->
      <!-- end samping -->
    <a href="<?=base_url()?>"><b>Box Operator</b> System </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="<?=site_url('auth/process')?>" method="post">
        <div class="input-group mb-3">
        <input type="text" name = "username" class="form-control" placeholder="Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name ="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>
