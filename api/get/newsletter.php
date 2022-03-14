<?php
include('../../db/connection.php');
$db = new db();
$newsletters = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM newsletter");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $newsletters[] = (array(
                'id' => $rows['id'],
                'title' => $rows['title'],
                'description' => $rows['description'],
                'poster' => $rows['poster'],
                'tags' => $rows['tags']
            ));
        };

        $totalData = $stmt->rowCount();

        $json_data = array(
            "recordsTotal"    => intval($totalData),
            "data"            => $newsletters
        );

        echo json_encode($json_data);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
