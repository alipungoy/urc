<?php
include('../include/notifications.php');
include("../db/connection.php");
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$DATE = date("y-m-d H:i:s");
$notifType = '7';
$id =  $_POST['ids'];
$proposalid = $_GET['propid'];
$status = "Review Ongoing";

if (!empty($id)) {
    $select = ("SELECT * FROM proposal WHERE proposalID = '" . $proposalid . "' ");
    $stmt = $db->connection->prepare($select);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($id as $reviewer) {
        $insert = ("INSERT INTO assignedreviewer (userID, proposalID) VALUES ('" . $reviewer . "', '" . $proposalid . "')");
        $stmt =  $db->connection->prepare($insert);
        $stmt->execute();
    }
    if ($stmt) {
        $update = ("UPDATE proposal SET status = '" . $status . "' WHERE proposalID = '" . $proposalid . "' ");
        $stmt =  $db->connection->prepare($update);
        $stmt->execute();

        if ($stmt) {
            foreach ($id as $toUser) {
                $notif = ("INSERT INTO urc_notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
            ('" . $userID . "', '" . $toUser . "', '" . $pendingRes . "', '" . $DATE . "', '" . $notifType . "')");
                $stmt = $db->connection->prepare($notif);
                $stmt->execute();
            }
        }
    }
    echo json_encode(array('alert' => array('msg' => 'Reviewer Assigned')));
} else {
    echo json_encode(array('alert' => array('msg' => 'empty')));
}
