<?php
session_start();
include('includes/dbconnection.php');
include('./h_files.php');
?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Management System</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.jpeg" />
    <link rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-light">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                    </a>
                </div>
                <div class="login-form shadow">
                    <div class="error-display">
                        <?php $UserErrorsPool->error_s("success","Password Reset Successful");?>
                        <?php $UserErrorsPool->error("failed","Password Reset Failed");?>
                        <?php $UserErrorsPool->error("err_empty","Password Reset Failed, Empty Fields");?>
                        <?php $UserErrorsPool->error("err_unset","Password Reset Failed, Unset Fields");?>
                    </div>
                    <form method="post" action="./handlers/_reset">
                            <?php echo empty($errorMsg)?"":$errorMsg; ?>
                            <div class="init text-center cool-forms">
                               <strong><h2 align="center">Reset</h2></strong>
                               <br>
                               <i class="fa fa-users fa-2x"></i>
                               <br>
                               <br>
                            </div>
                            <div class="form-collection">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" required class="form-control" placeholder="Email Address">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" required class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <br>
                        <div class="checkbox">
                           <label class="pull-left">
                                <a href="index">Go Back</a>
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>