<?php
session_start();
$id = $_SESSION['userid'];

include('../db/connection.php');
$db = new db();
$return_arr = array();
$status = 'Review Ongoing';

$sql = ("SELECT proposal.proposalID, proposal.title, proposal.funding, proposal.status FROM proposal LEFT JOIN assignedreviewer ON proposal.proposalID=assignedreviewer.proposalID WHERE assignedreviewer.userID = '".$id."' && status ='Review Ongoing' ");
$stmt =$db->connection->prepare($sql);
$stmt->execute();


  while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['proposalID'];
    $title = $row['title'];
    $funding = $row['funding'];
    $status = $row['status'];

  $return_arr[] = array(
    "id" => $id,
  "title" => $title,
  "funding" => $funding,
  "status" => $status);
}
    
echo json_encode($return_arr);
    
?>