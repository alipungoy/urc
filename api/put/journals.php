<?php
include('../../db/connection.php');
$db = new db();

// Allow post request only. doesn't seem to read PUT request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate for required fields
    if (!isset($_POST["journal__Type"]) || !isset($_POST["vol__Number"])) {
        $output = json_encode(array('type' => 'error', 'message' => 'Some required fields seems to be empty!'));
        die($output);
    }

    $DATE = date("y-m-d");

    // Assigned fields
    $valid_ext = array('pdf');
    $path = '../../journals/';
    $type = $_POST['journal__Type'];
    $volume = $_POST['vol__Number'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
    $journalFIle = $_FILES['journalFile'];
    $file = $_FILES['journalFile']['name'];
    $tmp = $_FILES['journalFile']['tmp_name'];
    $filename = ($file);
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));


    //cover photo
    $coverPath = '../../journals/coverphoto/';
    $journalCover = $_FILES['coverPhoto'];
    $coverPhoto = $_FILES['coverPhoto']['name'];
    $cover = $_FILES['coverPhoto']['tmp_name'];
    $coverName = ($coverPhoto);

    try {
        $check = ("SELECT volume, type FROM journals WHERE volume = '" . $volume . "' && type = '" . $type . "' ");
        $stmt = $db->connection->prepare($check);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($row < 1) {
            if (in_array($ext, $valid_ext)) {
                $path = $path . strtolower($filename);
                if (move_uploaded_file($tmp, $path)) {

                    $insert = ("INSERT INTO journals (file_name, type, volume, publication_date, tags, cover_photo) VALUES ('" . $filename . "','" . $type . "', '" . $volume . "', '" . $DATE . "', '" . $tags . "', '" . $coverName . "')");
                    $stmt = $db->connection->prepare($insert);
                    $stmt->execute();

                    if ($stmt) {
                        $coverPath = $coverPath . strtolower($coverName);
                        move_uploaded_file($cover, $coverPath);

                        echo json_encode(array('msg' => 'success'));
                    }
                }
            }
        } else {
            echo json_encode(array('msg' => 'exist'));
        }
    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
