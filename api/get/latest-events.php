<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM events ORDER BY id DESC LIMIT 5 ");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $events[] = (array(
                'id' => $rows['id'],
                'title' => $rows['event_title'],
                'start' => $rows['event_from_time'],
                'end' => $rows['event_to_time'],
                'details' => $rows['events_information'],
                'date' => $rows['pub_date'],
            ));
        };

        echo json_encode($events);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
