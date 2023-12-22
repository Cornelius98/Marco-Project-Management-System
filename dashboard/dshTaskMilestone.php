
<?php
    include('../includes/dbconnection.php');
    include('../includes/session.php');
    require_once('../h_files.php');
    $projectContainer = null;
    $task_name = "task";
    if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
        if($int = $NameSanitizer->is_whole_int($_GET["user_id"])){
            if($ProjectOperations->user_exist($_GET["user_id"])){
                $user_id = $int;
                $task_name = $_GET["task_name"];
                $o = $ProjectOperations->get_with_id($user_id);
                if(!is_array($o) || empty($o) || empty($o["user_id"]))
                    header("location:index?err_mirror_credentials");
                else {
                    $params = 'user_id='.$_GET["user_id"].'&&pid='.$_GET["pid"];
                }
                if(isset($_GET["pid"]) && !empty($_GET["pid"])){
                    if($pjr = $NameSanitizer->is_whole_int($_GET["pid"])){
                        $pid = $pjr;
                        $projectContainer = $ProjectOperations->get_project_with_id($pid);
                        if(is_array($projectContainer) && !empty($projectContainer)){
                            $pjr_id = $pjr;
                        }else header("location:index?err_pjr_empty");
                    }else  header("location:index?err_pjr_int");
                }else header("location:index?err_pjr");
            }else header("location:index?err_uthread_unexist");
        }else header("location:index?err_uthread_nn");
    }else header("location:index?err_pipe");
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
                                    <li><a href="#">Task</a></li>
                                    <li class="active">Milestone</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="start">Add Milstone To <?php echo $task_name;?></h2></strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form class="project-form">
                                            <div class="error-display"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Milestone Name</label>
                                                        <input id="pj_name" name="pj_name" type="text" class="form-control cc-exp" value="" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a task name" placeholder="Milestone Name">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label for="x_card_code" class="control-label mb-1">Milestone Description</label>
                                                    <input id="pj_desc" name="pj_desc" type="text" class="form-control cc-cvc" value="" Required data-val="true" data-val-required="Please enter a task description" data-val-cc-cvc="Please enter a task description" placeholder="Milestone Description">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Due Date</label>
                                                        <input id="pj_edate" name="pj_edate" type="date" class="form-control cc-exp" data-val="true" data-val-required="Please pick task start date" data-val-cc-exp="Please pick task end date" placeholder="task End Date">
                                                        <input id="proj_id" name="proj_id" type="hidden" value="<?php echo $projectContainer["proj_id"];?>" />
                                                        <input id="task_id" name="task_id" type="hidden" value="<?php echo $_GET["task_id"];?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" id="submitForm" class="btn btn-success">Submit Milestone</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="clearfix"></div>
            <?php include 'includes/footer.php';?>
        </div>
    </div>
</div>
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
    });
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
    $("#submitForm").click(function(evt){
        evt.preventDefault();
        let formData = new FormData(),
            pj_name = ($("#pj_name").val()!="")?$("#pj_name").val():$(".error-display").html('<div class="e-notice">Enter task Task Name</div>'),
            pj_desc = ($("#pj_desc").val()!="")?$("#pj_desc").val():0,
            pj_edate = ($("#pj_edate").val()!="")?$("#pj_edate").val():0;
            proj_id = ($("#proj_id").val()!="")?$("#proj_id").val():0;
            task_id = ($("#task_id").val()!="")?$("#task_id").val():0;
            
            formData.append("pj_name",pj_name);
            formData.append("pj_desc",pj_desc);
            formData.append("pj_edate",pj_edate);
            formData.append("proj_id",proj_id);
            formData.append("task_id",task_id);
            $.ajax({
                type: 'POST',
                url: '../handlers/_projectMilestone',
                processData: false,
                contentType: false,
                async: true,
                data:formData,
                success:function(q,status,settings){
                    let s = JSON.parse(q);
                    scrollTo(0,0);
                    if(s["status"]==200){
                        $(".error-display").html('<div class="e-success">Milestone Submitted Successfully</div>');
                    }else $(".error-display").html('<div class="e-notice">Operation Failed, Try Again</div>');
                }
            });
    });
</script>
</body>
</html>
