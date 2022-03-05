<?php
include("../db/connection.php");
$db = new db();

$id = $_POST['userid'];

if (!empty($id)) {
    $select = ("SELECT userID FROM reviewer_list WHERE userID = '". $id ."' ");
    $stmt = $db->connection->prepare($select);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row  < 1) {

        $insert = ("INSERT INTO reviewer_list (userID) VALUES ('". $id ."') ");
        $stmt = $db->connection->prepare($insert);
        $stmt->execute();

        if ($stmt) {
           echo ('success');
        }
    } else {
        echo ('exist');
    }
} else {
    echo ('empty');
}
