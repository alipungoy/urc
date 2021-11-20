<?php

include('../db/connection.php');
$db = new db();

$getdata = ("SELECT about_content FROM about");
$stmt = $db->connection->prepare($getdata);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$details = $row['about_content'];

echo json_encode($details);
