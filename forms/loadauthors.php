<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();


$numberofrecords = 10;

if(!isset($_POST['searchTerm'])){

   // Fetch records
   $stmt = $db->connection->prepare("SELECT * FROM faculty ORDER BY firstName LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $name = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Fetch records
   $stmt = $db->connection->prepare("SELECT * FROM faculty WHERE firstName like :fullname ORDER BY firstName LIMIT :limit");
   $stmt->bindValue(':fullname', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $name = $stmt->fetchAll();

}

$response = array();

// Read Data
foreach($name as $authors){
   $response[] = array(
     "id" => $authors['firstName'].' '.$authors['middleInitial'].' '.$authors['lastName'],
      "text" => $authors['firstName'].' '.$authors['middleInitial'].' '.$authors['lastName']
   );
}

echo json_encode($response);
exit();
?>