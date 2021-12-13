<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only. doesn't seem to read PUT request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["title"]) || !isset($_POST["description"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seems to be empty!'));
        die($output);
    }

     // Assigned fields
     $FORM_ID = $_POST['id'];
     $FORM_TITLE = $_POST['title'];
     $FORM_DESCRIPTION = $_POST['description'];
     $FORM_TAGS = isset($_POST['tags']) ? $_POST['tags'] : '';

    try {
        if (isset($_FILES["poster"]['name'])) {
            $FORM_POSTER = stripslashes($_FILES["poster"]["name"]);

            $UPLOAD_DIR = 'uploads/';
            $FILE_EXTENSION = strtolower(pathinfo($FORM_POSTER, PATHINFO_EXTENSION));
            $FILE_NAME = md5(date("ymdHis")).'.'.$FILE_EXTENSION;
            $FILE_PATH = $UPLOAD_DIR . basename($FILE_NAME);

            if($FILE_EXTENSION != 'pdf') {
                $output = json_encode(array('type' => 'error', 'message' => 'Poster file is not in pdf format!'));
                die($output);
            }
 
            move_uploaded_file($_FILES['poster']['tmp_name'], '../../' . $FILE_PATH);

            $sql = "UPDATE newsletter SET poster = :poster WHERE id = :id";
            $stmt = $db->connection->prepare($sql);
            $stmt->bindParam(':id', $FORM_ID);
            $stmt->bindParam(':poster', $FILE_PATH);
            $stmt->execute();
        }

        $sql = "UPDATE newsletter SET title = :title, description = :description, tags = :tags WHERE id = :id";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(':id', $FORM_ID);
        $stmt->bindParam(':title', $FORM_TITLE);
        $stmt->bindParam(':description', $FORM_DESCRIPTION);
        $stmt->bindParam(':tags', $FORM_TAGS);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Updated Newsletter')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}