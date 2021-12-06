<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only. doesn't seem to read PUT request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["id"]) || !isset($_POST["title"]) || !isset($_POST["details"]) || !isset($_POST["start"]) || !isset($_POST["end"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seemts to be empty!'));
        die($output);
    }

    // Assigned fields
    $FORM_ID = $_POST['id'];
    $FORM_TITLE = $_POST['title'];
    $FORM_DETAILS = $_POST['details'];
    $FORM_START = $_POST['start'];
    $FORM_END = $_POST['end'];
    // This should be boolean
    $FORM_WITH_REGISTRATION = isset($_POST['with_registration']) ? 'on' : 'off';
    // This should've been hexcode instead of name
    // https://stackoverflow.com/questions/2553566/how-to-convert-a-string-color-to-its-hex-code-or-rgb-value
    $FORM_COLOR = isset($_POST['color']) ? $_POST['color'] : 'blue';

    if ($FORM_START > $FORM_END) {
        $output = json_encode(array('type' => 'error', 'message' => 'End date must not exceed the start date!'));
        die($output);
    }

    try {
        $sql = "UPDATE events SET event_title = :title, events_information = :details, event_from_time = :start, event_to_time = :end, register_possible = :with_registration, color = :color WHERE id = :id";
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(':id', $FORM_ID);
        $stmt->bindParam(':title', $FORM_TITLE);
        $stmt->bindParam(':details', $FORM_DETAILS);
        $stmt->bindParam(':start', $FORM_START);
        $stmt->bindParam(':end', $FORM_END);
        $stmt->bindParam('with_registration', $FORM_WITH_REGISTRATION);
        $stmt->bindParam(':color', $FORM_COLOR);
        $stmt->execute();

        die(json_encode(array('type' => 'success', 'message' => 'Succesfully Updated News')));
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}