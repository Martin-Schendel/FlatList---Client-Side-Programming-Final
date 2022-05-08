<?php
require "config.php";
header("Access-Control-Allow-Origin: http://localhost:8080");

session_id($_POST['SessionID']);
session_start();
$auth = $_SESSION['auth'];

$TaskID = $_POST['TaskID'];
$UserID = $_POST['UserID'];


if($auth){
    $stmt = $conn->prepare("DELETE FROM task WHERE TaskID = ? AND UserID = ?");
    $stmt->bind_param("si", $TaskID, $UserID);

    if ($stmt->execute()){
        $res["status"] = "success";
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
}
}

echo json_encode($res);