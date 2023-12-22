<?php
session_start();
require_once ("../h_files.php");
$err_url = "../adashboard/dshProjectAttachment?user_id=$_GET[user_id]&&pid=$_GET[pid]";
if(isset($_GET["a_id"]) && !empty($_GET["proj_id"])){
    $a_id = $_GET["a_id"];
    $proj_id = $_GET["proj_id"];
    $f_name = $_GET["f_name"];
    $fs_url = "./uploads";
    if($ProjectOperations->delete_project_pictures($proj_id,$a_id)){
        if($ProjectOperations->fs_unlink($fs_url,$f_name))
            header("Location:$err_url&&success");
        else header("Location:$err_url&&delete_failed");
    }else header("Location:$err_url&&err_delete");
}else header("Location:$err_url&&err_ie");
?>