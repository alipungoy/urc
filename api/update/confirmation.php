<?php 
include ("../../db/connection.php");
$db = new db();

$token = $_POST['token'];



try{

    $update = "UPDATE user SET verified = '1' WHERE token = '".$token."' ";
    $stmt = $db->connection->prepare($update);
    $stmt->execute();

    echo json_encode(array('result' => array('msg' => 'Account Verified Succesfuly!')));

}catch (PDOException $e) {
    die(json_encode(array(
        'error'=>array(
            'msg'=> $e->getMessage()
        ),
    )));

}