<?php
include('../db/connection.php');
$db = new db();
$events = array();

$show = ("SELECT * FROM events ORDER BY id LIMIT 10");
$stmt = $db->connection->prepare($show);
$stmt->execute();
$row = $stmt->fetchAll();

foreach($row as $rows){
$events[] = (array('id' => $rows['id'],
                    'title' => $rows['event_title'],
                    'details' => $rows['events_information'],
                    'start' => $rows['event_from_time'], 
                    'end' => $rows['event_to_time']));
};

echo json_encode($events);

?>



