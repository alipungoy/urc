<?php
include ('../../db/connection.php');

$db = new db();

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    try{
        $update = "UPDATE journals SET views = views + 1 WHERE id = :id";
        $stmt = $db->connection->prepare($update);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    catch (Exception $e) {
        die($e->getMessage());
    }
}

?>