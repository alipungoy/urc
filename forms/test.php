<?php
date_default_timezone_set("Asia/Manila");
include('../db/connection.php');
include('../include/notifications.php');
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$lName = $_SESSION['last_name'];
// $mainAuthor = $_POST['mainAuth'];
$DATE = date("y-m-d");
$notifType = '1';
$ToUSER = '39';
$id = $_POST['propId'];
$rev_num = '1';

$valid_extensions = array('pdf'); // valid extensions
$path = '../uploads/revisions/'; // upload directory
$files = $_FILES['rtu'];
$img = $_FILES['rtu']['name'];
$tmp = $_FILES['rtu']['tmp_name'];
$filename = ($lName.'-'.$img);
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

if (!empty($img)) {
    $check = ("SELECT rev_number FROM revisions WHERE proposalID = :id");
    $stmt = $db->connection->prepare($check);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row < 1) {
    } elseif ($row >= 1) {
    }
} else {
    echo 'empty';
}
