<?php
require '../../db/connection.php';
$db = new db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['title']) || !isset($_POST['authors']) || !isset($_POST['abstract'])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some Fields Missing'));
        die($output);
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $abstract = $_POST['abstract'];

    try {

        $insert = ("INSERT INTO journal_patubas_details (journal_id, title, authors, abstract) VALUES (?, ?, ?, ?)");
        $stmt = $db->connection->prepare($insert);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $title);
        $stmt->bindParam(3, $authors);
        $stmt->bindParam(4, $abstract);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Added details to Journal')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
