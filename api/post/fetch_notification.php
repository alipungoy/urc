<?php

require '../../db/connection.php';
$db = new db();

session_start();
$id = $_SESSION['userid'];

if (isset($_POST['view'])) {

    if ($_POST['view'] != '') {

        $update = "UPDATE urc_notification SET status  = 1 WHERE status = 0 && toUser = '".$id."'";
        $stmt = $db->connection->prepare($update);
        $stmt->execute();
    }

    $notif = "SELECT notifMsg, notifDate FROM urc_notification WHERE status = 0 && toUser = '".$id."' ORDER BY notifID LIMIT 5";
    $stmt  = $db->connection->prepare($notif);
    $stmt->execute();
    $row = $stmt->fetchAll();

    foreach ($row as $rows) {
        $notifs[] = (array(
            'msg' => $rows['notifMsg'],
            'date' => $rows['notifDate']
        ));
    };

    $unseen = "SELECT status FROM urc_notification WHERE STATUS = 0 && toUser = '".$id."'";
    $stmt = $db->connection->prepare($unseen);
    $stmt->execute();
    
    $count = $stmt->rowCount();
    
    $data = array(
        "unseen_notif" => intval($count),
        "notif" => $notifs
    );

 echo json_encode($data);
}
