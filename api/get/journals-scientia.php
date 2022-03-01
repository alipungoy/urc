<?php
include('../../db/connection.php');
$db = new db();
$journals = array();

// Allow get request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Assign fields
    $FORM_SEARCH = isset($_GET['search']) ? $_GET['search'] : '';

    try {
        $sql = "SELECT journals.id, journals.type, journals.publication_date, journals.volume, cover_photo.path FROM journals LEFT JOIN cover_photo ON journals.id=cover_photo.journal_id WHERE type = 'Scientia Et FIdes' AND (journals.type LIKE '%:search%' OR journals.volume LIKE '%:search%') ORDER BY id DESC LIMIT 10";
        $stmt = $db->connection->prepare($sql);
        // $stmt->bindParam(':search', $FORM_SEARCH);
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $journals[] = (array('id' => $rows['id'],
                            'type' => $rows['type'],
                            'date' => $rows['publication_date'],
                            'vol' => $rows['volume'],
                            'cp' => $rows['path']
                        ));
        };

        die(json_encode(array('type' => 'success', 'data' => $journals)));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
