<?php 
session_start();
require_once ("../h_files.php");
$response = [
    "sanitized" =>[
        "isDiscussionSanitized" =>0
    ],
    "success" =>[
        "status" =>0,
        "discussions"=>0
    ]
];
$o['proj_id'] = $_POST["proj_id"];
$o['user_id'] = $_POST["user_id"];
$o["discussion"] = null;
if($DescriptionSanitize->description($_POST["discussion"])){
    $o["discussion"] = $DescriptionSanitize->description($_POST["discussion"]);
    $response["sanitized"]["isDiscussionSanitized"]=200;
}else {
    $response["sanitized"]["isDiscussionSanitized"]=200;
    $o["discussion"] = "";
}

if($ProjectOperations->add_discussion($o['proj_id'],$o['user_id'],$o['discussion'])){
    $response["success"]["status"] = 200;
    $discussions = $ProjectOperations->get_discussions($o['proj_id']);
    if(is_array($discussions) && !empty($discussions))
        $response["success"]["discussions"] = $discussions;
    else
        $response["success"]["discussions"] = 0;
}else  $response["success"]["status"] = 404;
echo json_encode($response["success"]);

?>