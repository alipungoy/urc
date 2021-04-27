<?php
date_default_timezone_set("Asia/Manila");
include('../db/connection.php');
include('../include/notifications.php');
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$lName = $_SESSION['last_name'];
$status = 'Pending';
// $mainAuthor = $_POST['mainAuth'];
$coAuthor = isset($_POST['coAuth']) ? $_POST['coAuth'] : [];
$DATE = date("y-m-d");
$notifType = '1';
$ToUSER = '39';

$valid_extensions = array('pdf'); // valid extensions
$path = '../uploads/'; // upload directory
$title = $_POST['title'];
$funding = $_POST['funding'];
$files = $_FILES['ftu'];
$img = $_FILES['ftu']['name'];
$tmp = $_FILES['ftu']['tmp_name'];
$filename = ($lName.'-'.$img);
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

$select = ("SELECT first_name, last_name FROM user WHERE userID = :userid");
$stmt = $db->connection->prepare($select);
$stmt->bindParam(':userid', $userID);
$stmt->execute();
$mainAuthRow = $stmt->fetch(PDO::FETCH_ASSOC);

$mainAuthor =  ($mainAuthRow['first_name'].' '.$mainAuthRow['last_name']);

$check = ("SELECT filename FROM urc_documents WHERE filename = :filename");
$stmt = $db->connection->prepare($check);
$stmt->bindParam(':filename', $filename);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($row < 1){
    
if(!empty($title || $funding) ||  $files)
{
// get uploaded file's extension

// can upload same image using rand function

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($filename); 
if(move_uploaded_file($tmp,$path)) 
{
//insert form data in the database
    $sql = ("INSERT INTO proposal (userid, title, funding, status) VALUES ('".$userID."', '".$title."', '".$funding."',  '".$status."')");
     $stmt = $db->connection->prepare($sql);
     $stmt->execute();
     $lastID = $db->connection->lastInsertId();

     $sql4 = ("INSERT INTO proposal_authors (fullname, proposal_id, ordinal) VALUES ('".$mainAuthor."', '".$lastID."', '1')");
     $stmt4 = $db->connection->prepare($sql4);
     $stmt4->execute();

     $counter = 1;
    foreach($coAuthor as $coAuth){
        $counter++;
        $sql5 = ("INSERT INTO proposal_authors (fullname, proposal_id, ordinal) VALUES ('".$coAuth."', '".$lastID."', '".$counter."')");
        $stmt =  $db->connection->prepare($sql5);
        $stmt->execute();  
    }

     if($stmt){
       $sql2 = ("INSERT INTO urc_documents (filename, proposalID, subDate) VALUES ('".$filename."', '".$lastID."', '".$DATE."')");
       $stmt = $db->connection->prepare($sql2);
       $stmt->execute();

       if($stmt){
          $sql3 = ("INSERT INTO urc_notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
           ('".$userID."', '".$ToUSER."', '".$upload."', '".$DATE."', '".$notifType."')");
          $stmt = $db->connection->prepare($sql3);
          $stmt->execute();
         }
       
     }
     echo 'ok';
}
} 
else 
{
echo 'invalid';
}
}
}
else {
    echo 'existing';
}
?>