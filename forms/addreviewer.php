<?php

include("../db/connection.php");
$db = new db();

$id =  $_POST['ids'];
$proposalid = $_GET['propid'];
$status = "Review Ongoing";

if(!empty($id || $proposalid)){
foreach($id as $reviewer){
    $insert = ("INSERT INTO assignedreviewer (userID, proposalID) VALUES ('".$reviewer."', '".$proposalid."')");
    $stmt =  $db->connection->prepare($insert);
    $stmt->execute();
}
if($stmt){
    $update = ("UPDATE proposal SET status = '".$status."' WHERE proposalID = '".$proposalid."' ");
    $stmt =  $db->connection->prepare($update);
    $stmt->execute();
    
    echo json_encode('ok');
}

}
else
{
    echo json_encode('empty');
}
?>