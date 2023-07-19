<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Get the ID from the URL using $_GET
        $id = $_GET['id'];
        $show = "SELECT * FROM urc_news WHERE id = :id"; // Use prepared statement with a placeholder for the ID
        $stmt = $db->connection->prepare($show);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID value to the placeholder
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach ($row as $rows) {
            $events[] = array(
                'id' => $rows['id'],
                'title' => $rows['title'],
                'details' => $rows['details'],
                'date' => $rows['date'],
            );
        }

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
?>
