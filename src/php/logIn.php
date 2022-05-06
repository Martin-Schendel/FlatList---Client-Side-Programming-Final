<?php
require_once "config.php";

$UserEmail = $_POST['UserEmail'];
$UserPassword = $_POST['UserPassword'];

$stmt = $conn->prepare("SELECT * FROM user WHERE user.UserEmail = ?");
$stmt->bind_param("s", $UserEmail);

$stmt->execute();
$result = $stmt->get_result();
foreach ($result as $user){
    if(password_verify($UserPassword, $user["UserPassword"])){
        $_SESSION['UserID'] = $user['UserID'];
        $_SESSION['UserFirstName'] = $user['UserFirstName'];
        $_SESSION['UserLastName'] = $user['UserLastName'];
        $_SESSION['UserEmail'] = $user['UserEmail'];
        $_SESSION['auth'] = true;

        $stmt = $conn->prepare("SELECT * FROM unit WHERE UserID = ? ORDER BY unit.Weight DESC");
        $stmt->bind_param("s", $user['UserID']);
        $stmt->execute();
        foreach($result as $unit){

        }

        $res["UserID"] = $_SESSION['UserID'];
        $res["UserFirstName"] = $_SESSION['UserFirstName'];
        $res["UserLastName"] = $_SESSION['UserLastName'];
        $res["UserEmail"] = $_SESSION['UserEmail'];
        $res["session"] = session_id();
        $res["auth"] = $_SESSION['auth'];
        $res["status"] = "success";
        $res["status_message"] = "Logged in";
        break;
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
    }

}
echo json_encode($res);