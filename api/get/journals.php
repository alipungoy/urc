<?php
include('../../db/connection.php');
$db = new db();
$journals = array();

// Allow get request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT journals.id, journals.type, journals.publication_date, journals.volume, journals.journal_name, cover_photo.path FROM journals LEFT JOIN cover_photo ON journals.id=cover_photo.journal_id");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();
        
        foreach ($row as $rows) {
            $journals[] = (array('id' => $rows['id'],
                            'type' => $rows['type'],
                            'date' => $rows['publication_date'],
                            'vol' => $rows['volume'],
                            'name' => $rows['journal_name'],
                            'cp' => $rows['path']
                        ));
        };
        
        echo json_encode($journals);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}