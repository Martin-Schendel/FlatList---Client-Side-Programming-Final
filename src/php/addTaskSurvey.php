<?php
require "config.php";
header("Access-Control-Allow-Origin: http://localhost:8080");

session_id($_POST['SessionID']);
session_start();
$auth = $_SESSION['auth'];

$TaskID = $_POST['TaskID'];
$UserID = $_POST['UserID'];
$surveyedWeight = $_POST['Weight'];
$oldSurveyCount = $_POST['SurveyCount'];
$newSurveyCount = $oldSurveyCount + 1;




if($auth){

    $stmt = $conn->prepare("SELECT * FROM task WHERE TaskID = ? AND UserID = ?");
    $stmt->bind_param("si", $TaskID, $UserID);
    $stmt->execute();
    $result = $stmt->get_result();
    foreach($result as $task){
        $oldCumulativeWeight = $task['Weight'];
    }
    $newCumulativeWeight = (($oldCumulativeWeight * $oldSurveyCount) + $surveyedWeight) / $newSurveyCount;
    
    $stmt = $conn->prepare("UPDATE `task` SET `Weight`=?,`SurveyCount`=? WHERE `TaskID` = ? AND `UserID` = ?");
    $stmt->bind_param("disi", $newCumulativeWeight, $newSurveyCount, $TaskID, $UserID);


    if ($stmt->execute()){
        $res["status"] = "success";
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
}
}

echo json_encode($res);