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
     $journalCover = $_FILES['coverPhoto'];
     $coverPhoto = $_FILES['coverPhotos']['name'];
     $cover = $_FILES['coverPhotos']['tmp_name'];
     $coverName = ($coverPhoto);

    try {
        if (in_array($ext, $valid_ext)) {
            $path = $path.strtolower($filename);
            if (move_uploaded_file($tmp, $path)) {

                $insert = ("INSERT INTO journals (file_name, type, volume, publication_date, tags) VALUES ('" . $filename . "','" . $type . "', '" . $volume . "', '" . $DATE . "', '" . $tags . "')");
                $stmt = $db->connection->prepare($insert);
                $stmt->execute();

                if($stmt) {
                    move_uploaded_file($cover, $path);
                }
            }
            
        }

    } catch (\Throwable $th) {
        $output = json_encode(array('type' => 'error', 'message' => $th->getMessage()));
        die($output);
    }
}
