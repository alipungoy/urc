<?php
include('../../db/connection.php');
$db = new db();
$journals = array();

// Allow get request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM journals_scientia ORDER BY ID desc LIMIT 5");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $journals[] = (array(
                'id' => $rows['id'],
                'title' => $rows['title'],
                'abstract' => $rows['abstract'],
                'author' => $rows['author'],
                'date' => $rows['publication_date'],
                'cp' => $rows['cover_photo']
            ));
        };

        echo json_encode($journals);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
