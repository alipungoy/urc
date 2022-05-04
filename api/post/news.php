<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["title"]) || !isset($_POST["details"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seemts to be empty!'));
        die($output);
    }

    // Assigned fields
    $FORM_TITLE = $_POST['title'];
    $FORM_DETAILS = $_POST['details'];
    $DATE = date("y-m-d");
    // This should be boolean
    // This should've been hexcode instead of name
    // https://stackoverflow.com/questions/2553566/how-to-convert-a-string-color-to-its-hex-code-or-rgb-value

    try {
        $sql = "INSERT INTO urc_news (title, details, date) VALUES (?, ?, ? )";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(1, $FORM_TITLE);
        $stmt->bindParam(2, $FORM_DETAILS);
        $stmt->bindParam(3, $DATE);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Created News')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}