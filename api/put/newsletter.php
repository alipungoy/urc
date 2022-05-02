<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only. doesn't seem to read PUT request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["volume"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seems to be empty!'));
        die($output);
    }

    $DATE = date("y-m-d");

    // Assigned fields
    $volume = $_POST['volume'];
    $date =  $_POST['date'];

    $valid_ext = array('pdf');
    $path = '../../newsletters/';
    $newsletter = $_FILES['newsletter_file'];
    $file = $_FILES['newsletter_file']['name'];
    $tmp = $_FILES['newsletter_file']['tmp_name'];
    $filename = ($file);
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));


    //cover photo
    $coverPath = '../../newsletters/coverphoto/';
    $journalCover = $_FILES['poster'];
    $coverPhoto = $_FILES['poster']['name'];
    $cover = $_FILES['poster']['tmp_name'];
    $coverName = ($coverPhoto);

    try {

            if (in_array($ext, $valid_ext)) {
                $path = $path . strtolower($filename);
                if (move_uploaded_file($tmp, $path)) {

                    $insert = ("INSERT INTO urc_newsletters (file_name, volume, date, cover_photo) VALUES (?, ?, ?, ?)");
                    $stmt = $db->connection->prepare($insert);
                    $stmt->bindParam(1, $filename);
                    $stmt->bindParam(2, $volume);
                    $stmt->bindParam(3, $date);
                    $stmt->bindParam(4, $coverName);
                    $stmt->execute();

                    if ($stmt) {
                        $coverPath = $coverPath . strtolower($coverName);
                        move_uploaded_file($cover, $coverPath);

                        echo json_encode(array('msg' => 'success'));
                    }
                }
            }
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
