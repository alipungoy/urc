<?php
include('../db/connection.php');
$db = new db();

$start = $_POST['start'];
$end = $_POST['start'];
$id = $_POST['id'];

$update = ("UPDATE events SET event_from_time = :start , event_to_time = :end WHERE id = :id");
$stmt=$db->connection->prepare($update);
$stmt->bindParam(':start', $start);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':id', $id);
$stmt->execute();

if($stmt){
    echo json_encode('success');
}

    
?>