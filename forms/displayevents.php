<?php
include('../db/connection.php');
$db = new db();
$return_arr = array();


    $sql = ("SELECT id, event_title, events_information, event_from_time, event_to_time FROM events ORDER BY id ASC LIMIT 6");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();


  while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $title = $row['event_title'];
    $details = $row['events_information'];
    $from = $row['event_from_time'];
    $to = $row['event_to_time'];

  $return_arr[] = array(
  "id" => $id,
  "title" => $title,
  "details" => $details,
  "startTime" => $from,
  "endTime" => $to);
}
    
echo json_encode($return_arr);
    
?>