<?php
date_default_timezone_set("Asia/Manila");
include("../db/connection.php");
$db = new db();

$id = $_POST['resId'];
$date = $_POST['approvalDate'];


$insert = ("UPDATE proposal SET approvalDate = '".$date."', status = 'Research Approved', approved = '1' WHERE proposalID = '".$id."' ");
$stmt = $db->connection->prepare($insert);
$stmt->execute();

if($stmt){
    echo json_encode('success');
}

?>