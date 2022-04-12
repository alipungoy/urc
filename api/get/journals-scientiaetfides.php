<?php
include('../../db/connection.php');
$db = new db();
$journals = array();

// Allow get request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $sql = "SELECT * FROM journals_scientia LIMIT 10";
        $stmt = $db->connection->prepare($sql);
        // $stmt->bindParam(':search', $FORM_SEARCH);
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

        die(json_encode(array('type' => 'success', 'data' => $journals)));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
