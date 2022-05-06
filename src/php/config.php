<?php

$hn = 'localhost';
$un = 'root';
$pw = 'mysql';
$db = 'flatlist';

header("Access-Control-Allow-Origin: http://localhost:8080");

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error){
    $res["status"] = "error";
    $res["status_message"] = "MySQL connection error";
}
