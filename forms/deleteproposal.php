<?php
include('../db/connection.php');
$db = new db();

$id = $_POST['id'];

$delete = ('DELETE FROM proposal WHERE proposalID = :id');
$stmt = $db->connection->prepare($delete);
$stmt->bindParam(':id', $id);
$stmt->execute();

echo json_encode(array('ok' => array('msg' => 'Proposal Deleted')));
?>