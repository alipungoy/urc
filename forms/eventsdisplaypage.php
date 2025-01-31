<?php
include('../db/connection.php');
$db = new db();

$id = $_GET['eventid'];


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $check = ("SELECT id FROM events WHERE id = :id");
        $stmt = $db->connection->prepare($check);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row >= 1) {
            $event = ("SELECT *  FROM events WHERE id = :id ");
            $stmt = $db->connection->prepare($event);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $data = array(
                'title' => $row['event_title'],
                'details' => $row['events_information'],
                'start' => $row['event_from_time'],
                'end' => $row['event_to_time'],
                'reg'  => $row['register_possible'],
                'date' => $row['pub_date']
            );

            echo json_encode($data);
        } else {
            echo json_encode('invalid');
        }
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
