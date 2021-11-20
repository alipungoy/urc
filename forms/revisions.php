<?php
date_default_timezone_set("Asia/Manila");
include('../db/connection.php');
include('../include/notifications.php');
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$lName = $_SESSION['last_name'];
// $mainAuthor = $_POST['mainAuth'];
$DATE = date("y-m-d");
$notifType = '1';
$ToUSER = '39';
$id = $_POST['propId'];
$rev_num = '1';

$valid_extensions = array('pdf'); // valid extensions
$path = '../uploads/revisions/'; // upload directory
$files = $_FILES['rtu'];
$img = $_FILES['rtu']['name'];
$tmp = $_FILES['rtu']['tmp_name'];
$filename = ($lName.'-'.$img);
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));


$select = ("SELECT * FROM proposal WHERE proposalID = :id");
$stmt = $db->connection->prepare($select);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$revTitle = $row['title'];

if (!empty($img)) {

// $select = ("SELECT * FROM revisions WHERE proposalID = :id");
    // $stmt = $db->connection->prepare($select);
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $check = ("SELECT rev_number FROM revisions WHERE proposalID = :id");
    $stmt = $db->connection->prepare($check);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($row < 1) {
        if (!empty($files)) {
            // get uploaded file's extension

            // can upload same image using rand function

            // check's valid format
            if (in_array($ext, $valid_extensions)) {
                $path = $path.strtolower($filename);
                if (move_uploaded_file($tmp, $path)) {


    
//insert form data in the database
                    $sql = ("INSERT INTO revisions (proposalID, revisions_title, rev_number, sub_date) VALUES ('".$id."', '".$revTitle."',  '".$rev_num."', '".$DATE."')");
                    $stmt = $db->connection->prepare($sql);
                    $stmt->execute();
                    $lastID = $db->connection->lastInsertId();

                    if ($stmt) {
                        $sql2 = ("INSERT INTO revision_documents (revisionsId, rev_filename, rev_sub_date) VALUE ('".$lastID."', '".$filename."', '".$DATE."')");
                        $stmt = $db->connection->prepare($sql2);
                        $stmt->execute();
                    }
                }
            }
        } else {
            echo 'empty';
        }
    } elseif ($row >= 1) {
        $select = ("SELECT rev_number FROM revisions WHERE proposalID = '".$id."' ORDER BY rev_number DESC");
        $stmt = $db->connection->prepare($select);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $revNumber = $row['rev_number'];

        echo $revNumber;
    
        $sql = ("INSERT INTO revisions (proposalID, revisions_title, rev_number, sub_date) VALUES ('".$id."', '".$revTitle."',  '".$revNumber."'+ 1, '".$DATE."')");
        $stmt = $db->connection->prepare($sql);
        $stmt->execute();
        $lastID = $db->connection->lastInsertId();

        if ($stmt) {
            $sql2 = ("INSERT INTO revision_documents (revisionsId, rev_filename, rev_sub_date) VALUE ('".$lastID."', '".$filename."', '".$DATE."')");
            $stmt = $db->connection->prepare($sql2);
            $stmt->execute();
        }
    }
}
