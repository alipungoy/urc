<?php
include('../db/connection.php');
$db = new db();

$id = $_GET['eventid'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $check = ("SELECT id FROM urc_news WHERE id = :id");
        $stmt = $db->connection->prepare($check);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row >= 1) {
            $event = ("SELECT title, details, date FROM urc_news WHERE id = :id ");
            $stmt = $db->connection->prepare($event);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $data = array(
                'title' => $row['title'],
                'details' => $row['details'],
                'date' => $row['date']
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
