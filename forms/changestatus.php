<?php
include('../db/connection.php');
$db = new db();

$id = $_POST['updateId'];
$status = $_POST['user_status'];

foreach ($id as $userid) {
    $update = ("UPDATE user SET user_type = :status WHERE userID = :id ");
}
$stmt = $db->connection->prepare($update);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $userid);
$stmt->execute();

echo json_encode('ok');
