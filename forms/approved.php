<?php
date_default_timezone_set("Asia/Manila");
include("../db/connection.php");
include('../include/notifications.php');
$db = new db();
session_start();

$userid = $_SESSION['userid'];
$ToUSER = '39';
$notifType = '8';

$id = $_GET['id'];


$insert = ("UPDATE proposal SET status = 'Approved By Researcher' ");
$stmt = $db->connection->prepare($insert);
$stmt->execute();

if($stmt){
    $sql3 = ("INSERT INTO notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
     ('".$userid."', '".$ToUSER."', '".$resApprvd."', '".$DATE."', '".$notifType."')");
    $stmt = $db->connection->prepare($sql3);
    $stmt->execute();
   }

if($stmt){
    echo json_encode('success');
}

?>