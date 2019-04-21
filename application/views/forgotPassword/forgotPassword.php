<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot password</title>
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

  <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Simplentory</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Forgot password
      <i class="icon ion-md-person-add"></i></span>
      <!-- <i class="fas fa-fish"></i> -->
    </p>

    <?php echo validation_errors(); ?>  

    <script type="text/javascript">
<?php if (!empty($errors)) {?>
  toastr.error("<?php echo $errors; ?>");
<?php }?>

<?php if ($this->session->flashdata('success')) {?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php } else if ($this->session->flashdata('error')) {?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php } else if ($this->session->flashdata('warning')) {?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php } else if ($this->session->flashdata('info')) {?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php }?>


</script>

    <form action="<?php echo base_url('forgotPassword/forgot') ?>" method="post">

    <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
        <i class="icon ion-ios-at form-control-feedback"></i>
      </div>
      <div class="row" style="display: flex;justify-content: center;">
        <!-- /.col -->
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
