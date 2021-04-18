<?php
include('../db/connection.php');
$db = new db();
$events = array();

$show = ("SELECT * FROM events LIMIT 10");
$stmt = $db->connection->prepare($show);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
$events[] = (array('id' => $row['id'],
                    'title' => $row['event_title'],
                    'details' => $row['events_information'],
                    'start' => $row['event_from_time'], 
                    'end' => $row['event_to_time']));
};

echo json_encode($events);

?>



