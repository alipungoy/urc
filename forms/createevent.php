<?php
include('../db/connection.php');
$db = new db();

$title = $_POST['eventitle'];
$details = trim($_POST['eventDetails']);
$from = $_POST['fromTime'];
$to = $_POST['toTime'];
$reg = $_POST['checkbox'];
$color = $_POST['color'];

if (!empty($title || $details || $from || $to)) {
    if (!empty($reg)) {
        $insert = ("INSERT INTO events (event_title, events_information, event_from_time, event_to_time, color, register_possible) VALUE (?, ?, ?, ?, ?, 'on')");
        $stmt = $db->connection->prepare($insert);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $details);
        $stmt->bindParam(3, $from);
        $stmt->bindParam(4, $to);
        $stmt->bindParam(5, $color);
        $stmt->execute();
    } else {
        $insert = ("INSERT INTO events (event_title, events_information, event_from_time, event_to_time, color, register_possible) VALUE (?, ?, ?, ?, ?, 'off')");
        $stmt = $db->connection->prepare($insert);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $details);
        $stmt->bindParam(3, $from);
        $stmt->bindParam(4, $to);
        $stmt->bindParam(5, $color);
        $stmt->execute();
    }
    if ($stmt) {
        echo json_encode(array('status' => array('msg' => 'Event created successfuly')));
    }
} else {
    echo json_encode(array('status' => array('msg' => 'empty fields please try again')));
}
