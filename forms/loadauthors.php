<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();


$numberofrecords = 10;

if(!isset($_POST['searchTerm'])){

   // Fetch records
   $stmt = $db->connection->prepare("SELECT * FROM authors ORDER BY fullname LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $name = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Fetch records
   $stmt = $db->connection->prepare("SELECT * FROM authors WHERE fullname like :fullname ORDER BY fullname LIMIT :limit");
   $stmt->bindValue(':fullname', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $name = $stmt->fetchAll();

}

$response = array();

// Read Data
foreach($name as $authors){
   $response[] = array(
     "id" => $authors['authorID'],
      "text" => $authors['fullname']
   );
}

echo json_encode($response);
exit();
?>