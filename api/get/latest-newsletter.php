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
    
        die(json_encode(array('type' => 'success', 'data' => $result)));
    } catch (Exception $e) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}