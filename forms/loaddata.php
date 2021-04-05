<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();
$return_arr = array();


    $sql = ("SELECT userID, first_name, last_name, email, user_type FROM user ORDER BY first_name ASC LIMIT 10");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();


  while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $userid = $row['userID'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $email = $row['email'];
    $type = $row['user_type'];

  $return_arr[] = array("id" => $userid,
  "firstname" => $firstname,
  "lastname" => $lastname,
  "email" => $email,
  "type" => $type);
}
    
echo json_encode($return_arr);
    
?>