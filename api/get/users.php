<?php
include('../../db/connection.php');
$db = new db();
$events = array();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $show = ("SELECT * FROM user");
        $stmt = $db->connection->prepare($show);
        $stmt->execute();
        $row = $stmt->fetchAll();
        
        foreach ($row as $rows) {
            $events[] = (array('id' => $rows['userID'],
                            'username' => $rows['username'],
                            'full_name' => $rows['first_name'] . ' ' . $rows['last_name'] . ' ' . $rows['suffix'],
                            'email' => $rows['email'],
                            'user_type' => $rows['user_type'],
                            'classification' => $rows['classification'],
                            'verified' => $rows['verified']));
        };
        
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

