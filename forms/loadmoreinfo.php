<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();

$id = $_GET['id'];


     $select = ("SELECT fullname FROM proposal_authors WHERE proposal_id = :id");
     $stmt = $db->connection->prepare($select);
     $stmt->bindParam(':id', $id);
     $stmt->execute();

     while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
         $data[] = array(
             "fullname" => $row['fullname']
         );
     }

     $response = array(
        "aaData" => $data
      
      );
          
      echo json_encode($response);
          
?>