<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM journals_scientia");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $events[] = (array(
                'title' => $rows['title'],
                'abstract' => $rows['abstract'],
                'author' => $rows['author'],
                'date' => $rows['publication_date'],
                'cp' => $rows['cover_photo']
            ));
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
