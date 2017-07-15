<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo assets('Admin/css/bootstrap.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo assets('Admin/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?php echo assets('Admin/css/all-skins.min.css');?>">
    <!--Main Style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="hold-transition skin-blue layout-top-nav fixed sidebar-collapse">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <button class="fix-btn-header" data-toggle="offcanvas">
          <i class="glyphicon glyphicon-menu-hamburger"></i></button>
                    </div>
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="Home.html">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="login.html">login</a></li>
                            <li><a href="addEvent.html">Addnew</a></li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <aside class="main-sidebar">
            <div class="main-sidebar">
                <!-- Inner sidebar -->
                <div class="sidebar">
                    <!-- user panel (Optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>User Name</p>

                            <a href="#"><i class="glyphicon glyphicon-user text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- /.user-panel -->

                    <!-- Search Form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
                        </div>
                    </form>
                    <!-- /.sidebar-form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">HEADER</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active"><a href="#"><span>Home</span></a>
                            <</li>
                                <li><a href="#"><span>addevent</span></a></li>
                                <li><a href="#"><span>Search</span></a></li>
                                <li><a href="#"><span>AddEvent</span></a></li>
                    </ul>
                    <!-- /.sidebar-menu -->

                </div>
                <!-- /.sidebar -->
            </div>
            <!-- /.main-sidebar -->
        </aside>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#" class="h4"><i class="glyphicon glyphicon-dashboard "></i> Home/</a></li>
                    </ol>

                </section>

                <!-- Main content -->
                <section class="content">
                   
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3.1.1 -->
<script src="<?php echo assets('Admin/js/jquery-3.1.1.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo assets('Admin/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo assets('Admin/js/js/app.min.js');?>"></script>
<!--jquery Validate-->
<script src="<?php echo assets('Admin/js/jquery.slimscroll.min.js');?>"></script>
</body>

</html>