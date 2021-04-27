<?php
session_start();
$id = $_SESSION['userid'];

include('../db/connection.php');
$db = new db();
$return_arr = array();
$status = 'Review Ongoing';

$sql = ("SELECT proposal.proposalID, proposal.title, proposal.funding, proposal.status, urc_documents.filename FROM ((proposal LEFT JOIN assignedreviewer ON proposal.proposalID=assignedreviewer.proposalID)LEFT JOIN urc_documents ON proposal.proposalID=urc_documents.proposalID) WHERE assignedreviewer.userID = '".$id."' && status ='Review Ongoing' ");
$stmt =$db->connection->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();

  foreach($row as $rows) {
    $id = $rows['proposalID'];
    $title = $rows['title'];
    $funding = $rows['funding'];
    $status = $rows['status'];
    $filename = $rows['filename'];

  $return_arr[] = array(
    "id" => $id,
  "title" => $title,
  "funding" => $funding,
  "status" => $status,
    "filename" => $filename);
}
    
echo json_encode($return_arr);
    
?>