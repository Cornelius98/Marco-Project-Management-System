
<?php
    include('../includes/dbconnection.php');
    include('../includes/session.php');
    error_reporting(0);
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
function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall2.php?fid="+str,true);
        xmlhttp.send();
    }
}
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
                                    <li class="active">Create</li>
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="start">Create Your Project</h2></strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form class="project-form">
                                            <div class="error-display"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Project Name</label>
                                                        <input id="pj_name" name="pj_name" type="text" class="form-control cc-exp" value="" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a project name" placeholder="Project Name">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label for="x_card_code" class="control-label mb-1">Project Description</label>
                                                    <input id="pj_desc" name="pj_desc" type="text" class="form-control cc-cvc" value="" Required data-val="true" data-val-required="Please enter a project description" data-val-cc-cvc="Please enter a project description" placeholder="Project Description">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Start Date</label>
                                                        <input id="pj_sdate" name="pj_sdate" type="date" class="form-control cc-exp" data-val="true" data-val-required="Please pick project start date" data-val-cc-exp="Please pick project start date" placeholder="Project Start Date">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Finishing Date</label>
                                                        <input id="pj_edate" name="pj_edate" type="date" class="form-control cc-exp" data-val="true" data-val-required="Please pick project start date" data-val-cc-exp="Please pick project end date" placeholder="Project End Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="pictures" class="control-label mb-1"><i class="fa fa-image fa-2x"></i></label>
                                                        <input id="pictures" name="pictures" class="project-form-pick-pictures" type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/gif,.pdf,.docx,.doc,.txt" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" id="submitForm" class="btn btn-success">Create Project</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
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
                pj_name = ($("#pj_name").val()!="")?$("#pj_name").val():$(".error-display").html('<div class="e-notice">Enter Project Name</div>'),
                pj_desc = ($("#pj_desc").val()!="")?$("#pj_desc").val():0,
                pj_sdate = ($("#pj_sdate").val()!="")?$("#pj_sdate").val():0,
                pj_edate = ($("#pj_edate").val()!="")?$("#pj_edate").val():0;
               
                formData.append("pj_name",pj_name);
                formData.append("pj_desc",pj_desc);
                formData.append("pj_sdate",pj_sdate);
                formData.append("pj_edate",pj_edate);
              
                let pictures = document.getElementById("pictures"),
                picturesFileList = pictures.files,
                picturesListLength = picturesFileList.length,
                j = 0;
                if(picturesListLength > 0){
                    while(j<=picturesListLength){
                        formData.append("pictures[]",picturesFileList[j]);
                        j++;
                    }
                }
                $.ajax({
                    type: 'POST',
                    url: '../handlers/_addProject',
                    processData: false,
                    contentType: false,
                    async: true,
                    data:formData,
                    success:function(q,status,settings){
                        let s = JSON.parse(q);
                        scrollTo(0,0);
                        $(".spin-wrap").css("display","none");
                        $(".dash-full-wrapper").css("animation","none");
                        if(s["status"]==200){
                            $(".error-display").html('<div class="e-success">Project Created</div>');
                        }else $(".error-display").html('<div class="e-notice">Operation Failed, Try Again</div>');
                    }
                });
        });
</script>
</body>
</html>
