<?php 
session_start();
require_once ("../h_files.php");
$response = [
    "set" =>[ 
        "isNameSet" =>0,
        "isDescSet" =>0,
        "isSdateSet" =>0,
        "isCdateSet" =>0,
        "isPicturesSet"=>0
    ],
    "void" =>[ 
        "isNameEmpty" =>0,
        "isDescEmpty" =>0,
        "isSdateEmpty" =>0,
        "isCdateEmpty" =>0,
        "isPicturesEmpty"=>0
    ],
    "sanitized" =>[
        "isNameSanitized" =>0,
        "isDescSanitized" =>0,
        "isSdateSanitized" =>0,
        "isCdateSanitized" =>0
    ],
    "pushedToServer" =>[
        "isDetailsPushed"=>0,
        "isPicturesPushed"=>0
    ],
    "success" =>[
        "status" =>0
    ]
];

isset($_POST["name"])?$response["set"]["isNameSet"]=200:$response["set"]["isNameSet"]=404;
isset($_POST["desc"])?$response["set"]["isDescSet"]=200:$response["set"]["isDescSet"]=404;
isset($_POST["sdate"])?$response["set"]["isSdateSet"]=200:$response["set"]["isSdateSet"]=404;
isset($_POST["cdate"])?$response["set"]["isCdateSet"]=200:$response["set"]["isCdateSet"]=404;
isset($_FILES["pictures"])?$response["set"]["isPicturesSet"]=200:$response["set"]["isPicturesSet"]=404;

!empty($_POST["name"])?$response["void"]["isNameEmpty"]=200:$response["void"]["isNameEmpty"]=404;
!empty($_POST["desc"])?$response["void"]["isDescEmpty"]=200:$response["void"]["isDescEmpty"]=404;
!empty($_POST["sdate"])?$response["void"]["isSdateEmpty"]=200:$response["void"]["isSdateEmpty"]=404;
!empty($_POST["cdate"])?$response["void"]["isCdateEmpty"]=200:$response["void"]["isCdateEmpty"]=404;
!empty($_FILES["pictures"])?$response["void"]["isPicturesEmpty"]=200:$response["void"]["isPicturesEmpty"]=404;

$o = [];
$o["user_id"] = (isset($_SESSION["adminTypeId"]) && !empty($_SESSION["adminTypeId"]))?$_SESSION["adminTypeId"]:1;
$o["status"] = 1;
$o["proj_id"] = $_POST["proj_id"];
$o["task_name"] = null;
if($NameSanitizer->artist_name($_POST["pj_name"])){
    $o["task_name"] = $NameSanitizer->artist_name($_POST["pj_name"]);
    $response["sanitized"]["isNameSanitized"]=200;
}else {
    $response["sanitized"]["isNameSanitized"]=404;
    $o["task_name"] = "Unamed";
}
$o["task_desc"] = null;
if($DescriptionSanitize->description($_POST["pj_desc"])){
    $o["task_desc"] = $DescriptionSanitize->description($_POST["pj_desc"]);
    $response["sanitized"]["isDescSanitized"]=200;
}else $response["sanitized"]["isDescSanitized"]=404;

if(!empty($_POST["pj_sdate"]))
    $o["task_sdate"] = $_POST["pj_sdate"];
else $o["task_sdate"] = 0;

if(!empty($_POST["pj_edate"]))
    $o["task_edate"] = $_POST["pj_edate"];
else $o["task_edate"] = 0;

if($ProjectOperations->add_task($o))
    $response["pushedToServer"]["isDetailsPushed"] = 200;
else $response["pushedToServer"]["isDetailsPushed"] = 404;

if($response["pushedToServer"]["isDetailsPushed"] == 200)
    $response["success"]["status"] = 200;
else $response["success"]["status"] = 404;
echo json_encode($response["success"]);
?>