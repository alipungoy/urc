<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();
$return_arr = array();


    $sql = ("SELECT id, event_title, events_information, event_from_time, event_to_time, color FROM events ORDER BY id ASC");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();


  foreach($result as $row) {
    $id = $row['id'];
    $title = $row['event_title'];
    $details = $row['events_information'];
    $from = $row['event_from_time'];
    $to = $row['event_to_time'];
    $color = $row['color'];

  $return_arr[] = array(
    "id" => $id,
  "title" => $title,
  "description" => $details,
  "start" => $from,
  "end" => $to,
  "color" => $color);
}
    
echo json_encode($return_arr);
    
?>