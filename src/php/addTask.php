<?php
require "config.php";
header("Access-Control-Allow-Origin: http://localhost:8080");

session_id($_POST['SessionID']);
session_start();
$auth = $_SESSION['auth'];

$TaskID = $_POST['TaskID'];
$UserID = $_POST['UserID'];
$Weight = $_POST['Weight'];
$SurveyCount = 1;


if($auth){
    $stmt = $conn->prepare("INSERT INTO task VALUES(?,?,?,?)");
    $stmt->bind_param("sidi", $TaskID, $UserID, $Weight, $SurveyCount);

    if ($stmt->execute()){
        $res["status"] = "success";
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
}
}

echo json_encode($res);