<?php
include ('../db/connection.php');
$db = new db();

session_start();
$filename = $_POST['filename'];

if (isset($_SESSION['loggedin'])) {
     
     $update = ("UPDATE journals SET downloads = downloads + 1 WHERE file_name = :filename");
     $stmt  = $db->connection->prepare($update);
     $stmt->bindParam(':filename', $filename);
     $stmt->execute();

     echo json_encode('true');

} else {
       echo json_encode('false');
}
