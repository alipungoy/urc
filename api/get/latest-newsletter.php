<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM urc_newsletters ORDER BY id LIMIT 10");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $results) {
            $newsletters[] = (array(
                'id' => $results['id'],
                'file' => $results['file_name'],
                'vol' => $results['volume'],
                'date' => $results['date'],
                'cp' => $results['cover_photo']
            ));
        }
    
        die(json_encode($newsletters));
    } catch (Exception $e) {
        $output = json_encode(array('type' => 'error', 'message' => $e->getMessage()));
        die($output);
    }
}