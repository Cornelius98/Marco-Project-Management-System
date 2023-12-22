<?php 
session_start();
require_once ("../h_files.php");
$url = "../reset";
if(isset($_POST["email"])  && isset($_POST["password"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $o["email"] = $_POST["email"];
        $o["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT);
        if($ProjectOperations->update_password($o))
            header("location:$url?success");
        else header("location:$url?failed");
    }else header("location:$url?err_empty");
}else header("location:$url?err_unset");
?>