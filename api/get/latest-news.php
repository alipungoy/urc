<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM urc_news ORDER BY id DESC LIMIT 5 ");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();
    
        foreach ($row as $rows) {
            $events[] = (array('id' => $rows['id'],
                        'title' => $rows['title'],
                    'date' => $rows['date']));
        };
    
        echo json_encode($events);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}