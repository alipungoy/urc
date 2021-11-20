<?php
include('../db/connection.php');
$db = new db();

$start = $_POST['updateStart'];
$end = $_POST['updateEnd'];
$id = $_GET['id'];

$update = ("UPDATE events SET event_from_time = :start , event_to_time = :end WHERE id = :id");
$stmt=$db->connection->prepare($update);
$stmt->bindParam(':start', $start);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':id', $id);
$stmt->execute();

echo json_encode(array('msg' => 'update succesful'));
