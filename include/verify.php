<?php
include ('db/connection.php');

$userId = $_SESSION['userid'] ?? null;


function isVerified ($userId) {
$db = new db();

 $sql = ('SELECT verified FROM user WHERE userID = :userid ');
    $stmt = $db->connection->prepare($sql);
    $stmt->bindParam(':userid', $userId);
    $stmt->execute();
    $row = $stmt->fetchColumn();  
    
  if ($row == 1) {
    return true;
  }
  else {
    return false;
  }
}

   
?>