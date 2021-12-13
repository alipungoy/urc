<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["title"]) || !isset($_POST["description"]) || !isset($_FILES["poster"]['name'])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seems to be empty!'));
        die($output);
    }

    // Assigned fields
    $FORM_TITLE = $_POST['title'];
    $FORM_DESCRIPTION = $_POST['description'];
    $FORM_TAGS = isset($_POST['tags']) ? $_POST['tags'] : '';
    $FORM_POSTER = stripslashes($_FILES["poster"]["name"]);

    $UPLOAD_DIR = 'uploads/';
    $FILE_EXTENSION = strtolower(pathinfo($FORM_POSTER, PATHINFO_EXTENSION));
    $FILE_NAME = md5(date("ymdHis")).'.'.$FILE_EXTENSION;
    $FILE_PATH = $UPLOAD_DIR . basename($FILE_NAME);

    try {
        move_uploaded_file($_FILES['poster']['tmp_name'], '../../' . $FILE_PATH);

        $sql = "INSERT INTO newsletter (title, description, poster, tags) VALUES (?, ?, ?, ?)";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(1, $FORM_TITLE);
        $stmt->bindParam(2, $FORM_DESCRIPTION);
        $stmt->bindParam(3, $FILE_PATH);
        $stmt->bindParam(4, $FORM_TAGS);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Created Newsletter')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}