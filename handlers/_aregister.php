<?php 
session_start();
require_once ("../h_files.php");
$url = "../register";
if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["dob"]) && isset($_POST["gender"]) && isset($_POST["phone"])  && isset($_POST["email"])  && isset($_POST["address"])  && isset($_POST["password"])){
    if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["dob"]) && !empty($_POST["gender"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["address"]) && !empty($_POST["password"])){
        $o["fname"] = $_POST["fname"];
        $o["lname"] = $_POST["lname"];
        $o["dob"] = $_POST["dob"];
        $o["gender"] = $_POST["gender"];
        $o["phone"] = $_POST["phone"];
        $o["email"] = $_POST["email"];
        $o["address"] = $_POST["address"];
        $o["role"] = 2;
        $o["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT);
        if(!$ProjectOperations->get_with_email($o["email"])){
            if(!$ProjectOperations->get_with_mobile($o["phone"])){
                if($ProjectOperations->register_administrator($o))
                    header("location:$url?success");
                else header("location:$url?failed");
            } else header("location:$url?exist_phone");
        }else header("location:$url?exist");
    }else header("location:$url?err_empty");
}else header("location:$url?err_unset");
?>