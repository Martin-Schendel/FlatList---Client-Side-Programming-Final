<?php
require "config.php";
header("Access-Control-Allow-Origin: http://localhost:8080");

session_id($_POST['SessionID']);
session_start();
$auth = $_SESSION['auth'];

$tasks = [];

$stmt = $conn->prepare("SELECT * FROM task WHERE UserID = ? ORDER BY task.Weight ASC");
$stmt->bind_param("i",$_POST['UserID']);

if($auth){
    if ($stmt->execute()){
        $result = $stmt->get_result();
        $rows = $result->num_rows;
        if ($rows >=1){
            foreach($result as $task){
                array_push($tasks, $task);
            }
        }else{
            $res["status"] = "error";
            $res["status_message"] = "No tasks found.";
        }
        $res["status"] = "success";
        $res["tasks"] = $tasks;
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
    }
}else{
    $res["status"] = "error";
    $res["status_message"] = "Unauthorized session";
}
echo json_encode($res);