<?php
include('../db/connection.php');
$db = new db();
$events = array();

$show = ("SELECT journals.id, journals.type, journals.publication_date, journals.volume, cover_photo.path FROM journals LEFT JOIN cover_photo ON journals.id=cover_photo.journal_id WHERE type = 'Patubas' LIMIT 10");
$stmt = $db->connection->prepare($show);
$stmt->execute();
$row = $stmt->fetchAll();

foreach ($row as $rows) {
    $events[] = (array('id' => $rows['id'],
                    'type' => $rows['type'],
                    'date' => $rows['publication_date'],
                    'vol' => $rows['volume'],
                    'cp' => $rows['path']
                ));
};

echo json_encode($events);

?>



