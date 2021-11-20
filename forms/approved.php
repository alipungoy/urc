<?php
date_default_timezone_set("Asia/Manila");
include("../db/connection.php");
include('../include/notifications.php');
$db = new db();
session_start();

$userid = $_SESSION['userid'];
$ToUSER = '39';
$notifType = '8';
$DATE =  date("y-m-d H:i:s");

$id = $_POST['id'];
$status = $_POST['status'];

$insert = ("UPDATE proposal SET status = :status WHERE proposalID = :id");
$stmt = $db->connection->prepare($insert);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $id);
$stmt->execute();


if ($stmt) {
    $select = ("SELECT userID FROM  proposal WHERE proposalID = :id");
    $stmt = $db->connection->prepare($select);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $toUserId = $row['userID'];

    if ($status == 'Reviewed For Presentation') {
        $sql3 = ("INSERT INTO urc_notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
     ('".$userid."', '".$ToUSER."', '".$forPresentation."', '".$DATE."', '".$notifType."')");
        $stmt = $db->connection->prepare($sql3);
        $stmt->execute();
    } else {
        $sql4 = ("INSERT INTO urc_notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
    ('".$userid."', '".$toUserId."', '".$wRevisions."', '".$DATE."', '".$notifType."')");
        $stmt = $db->connection->prepare($sql4);
        $stmt->execute();
    }

    if ($stmt) {
        echo json_encode('success');
    }
}
