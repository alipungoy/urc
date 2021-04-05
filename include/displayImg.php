<?php
session_start();
$id = $_SESSION['userID'];
include('../db/connection.php');
$db = new db();


    $sql = ("SELECT profileImg from user WHERE :userID = $id");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row >= 1){
        echo 'success';
    }
    
?>