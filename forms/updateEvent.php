<?php
include('../db/connection.php');
$db = new db();


$end = $_POST['updateEnd'];
$id = $_GET['id'];

if(isset($_GET['id'])) {
try{
$update = ("UPDATE events SET event_to_time = :end WHERE id = :id");
$stmt=$db->connection->prepare($update);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':id', $id);
$stmt->execute();

echo json_encode('ok');

} catch (Exception $e) {
    die($e->getMessage());
}
}