<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo assets('Admin/css/bootstrap.min.css');?>" >
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo assets('Admin/css/AdminLTE.min.css');?>" >
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo assets('Admin/css/blue.css');?>" >

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form  method="post" id='form' action="<?php echo url('/admin/login/submit');?>">

    <?php if ($errors){ ?>
    <div class="alert alert-danger" style="text-align:center;"><?php echo implode('<br>',$errors) ?></div>
        <?php };?> 
      <div class="form-group has-feedback">

        <input type="email" class="form-control" id='email' name='email'
         require aria-required='true' aria-describedby="email-format"  placeholder="Email" pattern="[a-zA-Z0-9_]+[@]+[a-z]+[.]+[a-z]+">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" maxlength=20 id='password'
        name='password' require aria-required='true' aria-describedby="pass-format" pattren="[a-zA-Z0-9_ ]" >

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id='check' name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" data-select="login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="<?php echo assets('Admin/js/jquery-3.1.1.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo assets('Admin/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo assets('Admin/js/icheck.min.js');?>"></script>
<!--jquery Validate-->
<script src="<?php echo assets('Admin/js/jquery.validate.min.js');?>"></script>
<!-- main js -->
<script src="<?php echo assets('Admin/js/login.js');?>"></script>
<script>
  $(function () {
    $('#check').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '26%' // optional
    });
  });
</script>
</body>
</html>
