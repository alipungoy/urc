<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();
$return_arr = array();


    $sql = ("SELECT * FROM authors");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();


  while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $authorid = $row['authorID'];
    $name = $row['fullname'];

  $return_arr[] = array("id" => $authorid,
  "fullname" => $name);
}
 
echo json_encode($return_arr);
    
?>