<?php
include("../../db/connection.php");
$db = new db();

$id = $_POST['userid'];

$delete = ("DELETE FROM reviewer_list WHERE userID ='" . $id . "' ");
$stmt = $db->connection->prepare($delete);
$stmt->execute();

if($stmt) {
    $update = ("UPDATE user SET reviewer = '0' WHERE userID = '".$id."' ");
    $stmt = $db->connection->prepare($update);
    $stmt->execute();
    
    if ($stmt) {
        echo ('ok');
    }    
}

