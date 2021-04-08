<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();
$return_arr = array();

$sql = ("SELECT userID, first_name, last_name, classification FROM user");
$stmt =$db->connection->prepare($sql);
$stmt->execute();


  while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['userID'];
    $fName = $row['first_name'];
    $lName = $row['last_name'];
    $classification = $row['classification'];

  $return_arr[] = array(
  "id" => $id,
  "fName" => $fName,
  "lName" => $lName,
    "classification" => $classification);
}
    
echo json_encode($return_arr);
    
?>