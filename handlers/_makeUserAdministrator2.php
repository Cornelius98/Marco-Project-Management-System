<?php
session_start();
require_once ("../h_files.php");
$err_url = "../adashboard/dshShowAdministrators";
if(!empty($_GET["user_id"]) && !empty($_GET["email"]) && !empty($_GET["role"])){
    $user_id = $_GET["user_id"];
    $role = $_GET["role"];
    if($role==1)
        $role = 2;
    else $role = 1;
    if($ProjectOperations->adjust_account($user_id,$role))
        header("Location:$err_url?success");
    else header("Location:$err_url?failed");
}else header("Location:$err_url?err_ie");
?>