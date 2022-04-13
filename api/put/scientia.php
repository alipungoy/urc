<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only. doesn't seem to read PUT request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["journals__Title"]) || !isset($_POST["journals__Abstract"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seemts to be empty!'));
        die($output);
    }

    // Assigned fields
    $FORM_ID = $_POST['id'];
    $FORM_TITLE = $_POST['journals__Title'];
    $FORM_ABSTRACT= $_POST['journals__Abstract'];

    // This should be boolean

    // This should've been hexcode instead of name
    // https://stackoverflow.com/questions/2553566/how-to-convert-a-string-color-to-its-hex-code-or-rgb-value


    try {
        $sql = "UPDATE journals_scientia SET title = :title, abstract = :abstract WHERE id = :id";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(':id', $FORM_ID);
        $stmt->bindParam(':title', $FORM_TITLE);
        $stmt->bindParam(':abstract', $FORM_ABSTRACT);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Updated')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}