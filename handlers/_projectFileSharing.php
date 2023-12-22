<?php 
session_start();
require_once ('../h_files.php');
$response = [
    "success" =>[
        "status" =>0
    ]
];
$o = [];
$o['proj_id'] = $_POST["proj_id"];
$o["user_id"] = $_POST["user_id"];
if($ProjectOperations->share($o['proj_id'],$o['user_id']))
    $response["success"]["status"] = 200;
else  $response["success"]["status"] = 404;
echo json_encode($response["success"]);
?>