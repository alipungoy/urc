<?php
include('../../db/connection.php');
$db = new db();

// Allow get request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     // Validate for required fields
     if (!isset($_GET["id"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Id not found!'));
        die($output);
    }

    // Assigned fields
    $FORM_ID = $_GET['id'];

    try {
        $sql = "SELECT * FROM newsletter where id =:id";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(':id', $FORM_ID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchObject();

        die(json_encode(array('type' => 'success', 'data' => $result)));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}