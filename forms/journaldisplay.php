<?php
include('../db/connection.php');
$db = new db();

$id = $_GET['eventid'];

$event = ("SELECT journals.journal_name, journals.type, journals.publication_date, journals.volume, cover_photo.path FROM journals LEFT JOIN cover_photo ON journals.id=cover_photo.journal_id WHERE journals.id = :id ");
$stmt = $db->connection->prepare($event);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$data = array(
    'type' => $row['type'],
    'date' => $row['publication_date'],
    'volume' => $row['volume'],
    'cp' => $row['path'],
    'name' => $row['journal_name']
    );

    echo json_encode($data);
