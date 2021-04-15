<?php
date_default_timezone_set("Asia/Manila");
include("../db/connection.php");
$db = new db();

$id = $_GET['id'];


$insert = ("UPDATE proposal SET approvalDate = NOW(), status = 'Research Approved', approved = '1' ");
$stmt = $db->connection->prepare($insert);
$stmt->execute();

if($stmt){
    echo json_encode('success');
}

?>