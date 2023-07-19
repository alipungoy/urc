<?php
date_default_timezone_set("Asia/Manila");
include('../db/connection.php');
include('../include/notifications.php');
$db = new db();

session_start();


$valid_extensions = array('pdf', 'jpg', 'png', 'jpeg'); // valid extensions
$path = '../journals/';
$cpPath = '../journals/coverphoto';// upload directory
$type = $_POST['journalType'];
$vol = $_POST['volume'];
$DATE = $_POST['pubDate'];
$files = $_FILES['jtu'];
$photo = $_FILES['cp'];
$img = $_FILES['jtu']['name'];
$cp = $_FILES['cp']['name'];
$tmp = $_FILES['jtu']['tmp_name'];
$tmp_cp = $_FILES['cp']['tmp_name'];
$cp_name = $cpPath . $cp;
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$cpExt = strtolower(pathinfo($cp, PATHINFO_EXTENSION));


$check = ("SELECT type FROM journals WHERE volume = :volume");
$stmt = $db->connection->prepare($check);
$stmt->bindParam(':volume', $vol);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row < 1) {
    if (!empty($type || $vol) ||  $files || $photo) {
        // get uploaded file's extension


        // check's valid format
        if (in_array($ext, $valid_extensions)) {
            $path = $path.strtolower($img);
            if (move_uploaded_file($tmp, $path)) {

                
                //insert form data in the database
                $insert = ("INSERT INTO journals (type, publication_date, volume, journal_name) VALUES ('".$type."', '".$DATE."', '".$vol."', '".$img."')");
                $stmt=$db->connection->prepare($insert);
                $stmt->execute();
                $lastID = $db->connection->lastInsertId();
 
                if ($stmt) {
                    if (in_array($cpExt, $valid_extensions)) {
                        $cpPath = $cpPath.strtolower($cp);
                        if (move_uploaded_file($tmp_cp, $cpPath)) {
                            $insert2 = ("INSERT INTO cover_photo (path, journal_id) VALUES ('".$cp_name."', '".$lastID."')");
                            $stmt=$db->connection->prepare($insert2);
                            $stmt->execute();
                        }
                    }
                }
            }
        } else {
            echo 'invalid';
        }
    }
} else {
    echo 'existing';
}
