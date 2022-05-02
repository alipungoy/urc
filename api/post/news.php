<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["title"]) || !isset($_POST["details"]) || !isset($_POST["start"]) || !isset($_POST["end"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seemts to be empty!'));
        die($output);
    }

    // Assigned fields
    $FORM_TITLE = $_POST['title'];
    $FORM_DETAILS = $_POST['details'];
    $FORM_START = $_POST['start'];
    $FORM_END = $_POST['end'];
    // This should be boolean
    // This should've been hexcode instead of name
    // https://stackoverflow.com/questions/2553566/how-to-convert-a-string-color-to-its-hex-code-or-rgb-value
    $FORM_COLOR = isset($_POST['color']) ? $_POST['color'] : 'blue';

    if ($FORM_START > $FORM_END) {
        $output = json_encode(array('type' => 'error', 'message' => 'End date must not exceed the start date!'));
        die($output);
    }

    try {
        $sql = "INSERT INTO events (event_title, events_information, event_from_time, event_to_time, register_possible, color) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(1, $FORM_TITLE);
        $stmt->bindParam(2, $FORM_DETAILS);
        $stmt->bindParam(3, $FORM_START);
        $stmt->bindParam(4, $FORM_END);
        $stmt->bindParam(5, $FORM_WITH_REGISTRATION);
        $stmt->bindParam(6, $FORM_COLOR);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Created News')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}