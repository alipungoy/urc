<?php
include('../../db/connection.php');
$db = new db();
$journals = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT journals.id, journals.type, journals.publication_date, journals.volume, cover_photo.path FROM journals LEFT JOIN cover_photo ON journals.id=cover_photo.journal_id WHERE type = 'Patubas' LIMIT 10");
        $stmt = $db->connection->prepare($show);
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
        
        echo json_encode($journals);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}