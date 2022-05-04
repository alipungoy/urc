<?php
include('../db/connection.php');
$db = new db();

$id = $_GET['eventid'];

$event = ("SELECT title, details, date FROM urc_news WHERE id = :id ");
$stmt = $db->connection->prepare($event);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$data = array(
    'title' => $row['title'],
    'details' => $row['details'],
    'date' => $row['date']
    );

    echo json_encode($data);
