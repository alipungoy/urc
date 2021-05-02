<?php
session_start();
$id = $_SESSION['userid'];
include('../db/connection.php');
$db = new db();


$select = ("SELECT first_name, last_name FROM user WHERE userID = :userid");
$stmt = $db->connection->prepare($select);
$stmt->bindParam(':userid', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$name[] = array(
    "fName" => $row['first_name'],
    "lName" => $row['last_name']
);

echo json_encode($name);
?>