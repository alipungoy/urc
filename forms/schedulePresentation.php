<?php
include('../db/connection.php');
$db = new db();

$date = $_POST['date'];
$time = $_POST['time'];
$id = $_GET['id'];

if (!empty($date || $time)) {
    $select = ("SELECT * FROM presentation_schedule WHERE proposal_id = '".$id."' ");
    $stmt = $db->connection->prepare($select);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row < 1) {
        $insert = ("INSERT into presentation_schedule (proposal_id, presentation_date, presentation_time) VALUES (?, ? ,?)");
        $stmt = $db->connection->prepare($insert);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $date);
        $stmt->bindParam(3, $time);
        $stmt->execute();
    
        if ($stmt) {
            echo json_encode('success');
        } else {
            echo json_encode('fail');
        }
    } else {
        echo json_encode('exist');
    }
} else {
    echo json_encode('empty');
}
