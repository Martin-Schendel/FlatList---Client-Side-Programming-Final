<?php
session_start();

session_destroy();
$res["status"] = "success";
$res["status_message"] = "Logged out";
$res["auth"] = false;

echo json_encode($res);