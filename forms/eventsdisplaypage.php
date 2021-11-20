<?php
include('../db/connection.php');
$db = new db();

$id = $_GET['eventid'];

$event = ("SELECT event_title, event_from_time, events_information FROM events WHERE id = :id ");
$stmt = $db->connection->prepare($event);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$data = array(
    'title' => $row['event_title'],
    'date' => $row['event_from_time'],
    'info' => $row['events_information']
    );

    echo json_encode($data);
