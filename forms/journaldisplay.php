<?php
include('../db/connection.php');
$db = new db();

$type = $_GET['type'];
$id = $_GET['id'];


if ($type === 'scientia') {
    $scientia = ("SELECT * FROM journals_scientia WHERE id = :id");
    $stmt = $db->connection->prepare($scientia);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $data = array(
        'title' => $row['title'],
        'abstract' => $row['abstract'],
        'author' => $row['author'],
        'date' => $row['publication_date']
    );
    echo json_encode($data);
} elseif ($type === 'patubas') {
    $patubas = ("SELECT journals.file_name, journals.volume, journals.publication_date, journals.cover_photo, journal_patubas_details.title, journal_patubas_details.authors, journal_patubas_details.abstract,
    journal_patubas_details.id FROM 
    journals LEFT JOIN journal_patubas_details ON journals.id = journal_patubas_details.journal_id WHERE journals.id = :id && journal_patubas_details.journal_id");
    $stmt = $db->connection->prepare($patubas);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetchAll();

    foreach ($row as $rows) {
        $data[] = (array(
            'id' => $rows['id'],
            'volume' => $rows['volume'],
            'date' => $rows['publication_date'],
            'cp' => $rows['cover_photo'],
            'file' => $rows['file_name'],
            'title' => $rows['title'],
            'authors' => $rows['authors'],
            'abstract' => $rows['abstract']));
    };
    echo json_encode($data);
}
