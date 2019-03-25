
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  
  
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>"> -->
  <!-- <link href='assets/bower_components/Ionicons/css/ionicons.min.css' rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css') ?>"> -->
  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">


  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  
  <link rel="stylesheet" href="<?php echo base_url("system/fonts/Sniglet-Regular.ttf") ?>">
  
  <!-- <link rel="stylesheet" href="<?php echo base_url("https://github.com/elartix/circular-std/blob/master/fonts/CircularStd-Medium.ttf") ?>"> -->

  <!-- 'Fira Sans','Maven Pro','Nunito','Oxygen','Quicksand','Work Sans', -->

  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

  <!-- <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet"> -->



</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Simplentory</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new user
      <i class="icon ion-md-person-add"></i></span>
      <!-- <i class="fas fa-fish"></i> -->
    </p>

    <?php echo validation_errors(); ?>  

    <form action="<?php echo base_url('reg/create') ?>" method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
        <i class="icon ion-md-contact form-control-feedback"></i>
        <!-- <span class="icon ion-person form-control-feedback"></span> -->
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First Name">
        <i class="icon ion-md-arrow-round-back form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Last name">
        <i class="icon ion-md-arrow-round-forward form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
        <i class="icon ion-ios-at form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone No. ">
        <i class="icon ion-md-call form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      </div>

      <div class="form-group has-feedback">
      <label for="gender">Gender</label>
         <div class="radio">
            <label >
              <input type="radio" value="m" name="gender" > 
                  Male <i class="icon ion-md-male"></i>
                  </label>
                  <label>
                  <input type="radio" value="f" name="gender">
                  Female <i class="icon ion-md-female"></i>
                  </label>
            </div>


      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
        <i class="icon ion-md-key form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Retype password">
        <i class="icon ion-md-key form-control-feedback"></i>
        <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          
        </div>
        <!-- /.col -->
      </div>
    </form>


    Already a member? <a href="<?php echo base_url('auth/login') ?>" class="text-center">Sign in</a>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>

<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script> 
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
