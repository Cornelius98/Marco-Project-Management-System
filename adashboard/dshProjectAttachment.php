<?php
    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../h_files.php');
    $projectContainer = null;
    if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
        if($int = $NameSanitizer->is_whole_int($_GET["user_id"])){
            if($ProjectOperations->user_exist($_GET["user_id"])){
                $user_id = $int;
                $o = $ProjectOperations->get_with_id($user_id);
                if(!is_array($o) || empty($o) || empty($o["user_id"]))
                    header("location:index?err_mirror_credentials");
                else {
                    $params = 'user_id='.$_GET["user_id"].'&&pid='.$_GET["pid"];
                }
                if(isset($_GET["pid"]) && !empty($_GET["pid"])){
                    if($pjr = $NameSanitizer->is_whole_int($_GET["pid"])){
                        $pid = $pjr;
                        $projectContainer = $ProjectOperations->get_attachments($pid);
                        if(is_array($projectContainer) && !empty($projectContainer)){
                            $pjr_id = $pjr;
                        }
                    }
                }
            }
        }
    }
  ?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
<script>
</script>
</head>
<body>
    <?php $page="student"; include 'includes/leftMenu.php';?>
    <div id="right-panel" class="right-panel">
        <?php include 'includes/header.php';?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Projects</a></li>
                                    <li class="active">Attachments</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="left">Project Pictures</h2></strong>
                            </div>
                            <div class="card-body">
                                <div class="error-display">
                                    <?php $UserErrorsPool->error("success","Attachment Delete Successful");?>
                                    <?php $UserErrorsPool->error_s("delete_failed","Attachment Delete Successful");?>
                                    <?php $UserErrorsPool->error("err_ie","Attachment Credentials Not Set");?>
                                    <?php $UserErrorsPool->error("err_delete","Error Deleting Picture");?>
                                </div>
                                <div class="image-wrapper">
                                    <?php
                                        if(is_array($projectContainer) && !empty($projectContainer)){
                                            foreach($projectContainer as $images){
                                                echo '<div class="img-host">
                                                    <img src="../uploads/'.$images["file_name"].'" alt="project-image">
                                                    <div class="img-host-btns">
                                                        <a download ="'.$images["file_name"].'" href="../uploads/'.$images["file_name"].'"><i class="fa fa-download"></i></a>
                                                        <a href="../handlers/_deleteProjectPicturea?a_id='.$images["a_id"].'&&proj_id='.$images["proj_id"].'&&f_name='.$images["file_name"].'&&user_id='.$images["user_id"].'&&pid='.$images["proj_id"].'"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>';
                                            }
                                        }else {
                                            echo '<strong><h4>Project Attachments Unavailable</h4></strong>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php include 'includes/footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/data-table/datatables.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/jszip.min.js"></script>
<script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="../assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
                $('#left-panel').slideToggle(); 
                } else {
                $('#left-panel').toggleClass('open-menu');  
                } 
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');  
            } 
                
            }); 
      
  </script>
</body>
</html>
