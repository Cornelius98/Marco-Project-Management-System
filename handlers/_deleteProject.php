<?php
session_start();
require_once ("../h_files.php");
$err_url = "../dashboard/dshShowProjects";
if(isset($_GET["user_id"]) && !empty($_GET["pid"])){
    $user_id = $_GET["user_id"];
    $proj_id = $_GET["pid"];
    if($ProjectOperations->delete_project($proj_id,$user_id))
        header("Location:$err_url?success");
    else header("Location:$err_url?err_delete");
}else header("Location:$err_url?err_ie");
?>