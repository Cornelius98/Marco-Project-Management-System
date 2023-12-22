<?php
    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../h_files.php');
    $user_id = $_SESSION['staffId'];
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
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Users</a></li>
                                    <li class="active">Show All</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="left">System Administrators</h2></strong>
                            </div>
                            <div class="card-body">
                                <div class="error-display">
                                    <?php $UserErrorsPool->error_s("success","Account Type Transition Successful.");?>
                                    <?php $UserErrorsPool->error_s("ers_success","Account Delete Successful.");?>
                                    <?php $UserErrorsPool->error("err_ie","User Credentials Not Set.");?>
                                    <?php $UserErrorsPool->error("failed","Account Type Transition Failed.");?>
                                    <?php $UserErrorsPool->error("ers_failed","Account Delete Unsuccessful.");?>
                                    <?php $UserErrorsPool->error("unexist","Account Does Not Exist.");?>
                                    <?php $UserErrorsPool->error("ers_unexist","Account Does Not Exist.");?>
                                </div>
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Location</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                    <?php
                    $ret=mysqli_query($con,"SELECT * FROM `users` WHERE `users`.`role`=2 ORDER BY `users`.`user_id` DESC;");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {
                    ?>
                    <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['fname']." ".$row['lname'];?></td>
                    <td><?php  echo $row['email'];?></td>
                    <td><?php  echo $row['phone'];?></td>
                    <td><?php  echo $row['address'];?></td>
                    <td> 
                        <div class="project-actions"> 
                            <a href="../handlers/_deleteUser2?user_id=<?php echo $row['user_id'];?>&&email=<?php echo $row['email'];?>&&role=<?php echo $row['role'];?>" title="Delete User"><i class="btn btn-sm btn-warning fa fa-trash fa-1x"> Delete</i></a>
                            <?php   
                                if($row["role"]==1)
                                    echo '<a href="../handlers/_makeUserAdministrator2?user_id='.$row['user_id'].'&&email='.$row['email'].'&&role='.$row['role'].'" title="Change Account Type"><i class="btn btn-sm btn-warning fa fa-recycle fa-1x"> Upgrade Account</i></a>';
                                else 
                                    echo '<a href="../handlers/_makeUserAdministrator2?user_id='.$row['user_id'].'&&email='.$row['email'].'&&role='.$row['role'].'" title="Change Account Type"><i class="btn btn-sm btn-success fa fa-recycle fa-1x"> Downgrade</i></a>';
                            ?>
                        </div>
                    </tr>
                    <?php 
                    $cnt=$cnt+1;
                    }?>
                                                                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php include 'includes/footer.php';?>
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
