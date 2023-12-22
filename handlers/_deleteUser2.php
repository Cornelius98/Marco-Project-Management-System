<?php
session_start();
require_once ("../h_files.php");
$err_url = "../adashboard/dshShowAdministrators";
if(!empty($_GET["user_id"]) && !empty($_GET["email"]) && !empty($_GET["role"])){
    $user_id = $_GET["user_id"];
    $role = $_GET["role"];
    if($ProjectOperations->user_exist($user_id)){
        if($ProjectOperations->delete_account($user_id))
            header("Location:$err_url?ers_success");
        else header("Location:$err_url?ers_failed");
    }else header("Location:$err_url?ers_unexist");
}else header("Location:$err_url?err_ie");
?>