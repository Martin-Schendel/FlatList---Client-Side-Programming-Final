<?php
require_once "config.php";

$UserID = null;
$UserFirstName = $_POST['UserFirstName'];
$UserLastName = $_POST['UserLastName'];
$UserEmail = $_POST['UserEmail'];
$UserPassword = password_hash($_POST['UserPassword'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO user VALUES(?,?,?,?,?)");
$stmt->bind_param("issss", $UserID, $UserFirstName, $UserLastName, $UserEmail, $UserPassword);

if($stmt->execute()){
    $UserID = $conn->insert_id;
    $stmt->close();
    $conn->close();
    session_start();
    $_SESSION["UserID"] = $UserID;
    $_SESSION["UserFirstName"] = $UserFirstName;
    $_SESSION["UserLastName"] = $UserLastName;
    $_SESSION["UserEmail"] = $UserEmail;

    $res["UserID"] = $UserID;
    $res["UserFirstName"] = $UserFirstName;
    $res["UserLastName"] = $UserLastName;
    $res["UserEmail"] = $UserEmail;
    $res["session"] = session_id();
    $res["auth"] = true;
    $res["status"] = "success";
    $res["status_message"] = "User added to database";
}else{
    $res["status"] = "error";
    $res["status_message"] = $stmt->error;
}

echo json_encode($res);