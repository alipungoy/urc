<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM events");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();
        
        foreach ($row as $rows) {
            $events[] = (array('id' => $rows['id'],
                            'title' => $rows['event_title'],
                            'details' => $rows['events_information'],
                            'start' => $rows['event_from_time'],
                            'end' => $rows['event_to_time']));
        };
        
        $totalData = $stmt->rowCount();

        $json_data = array(
            "recordsTotal"    => intval($totalData),
            "data"            => $events
        );

        echo json_encode($json_data);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

