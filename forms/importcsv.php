
<?php
include("../db/connection.php");
$db = new db();


 $allowedfile = array('csv');
 $csvfile =  $_FILES['csvtu'];
 $csv = $_FILES['csvtu']['name'];
 $tmp_csv = $_FILES['csvtu']['tmp_name'];
 $ext = strtolower(pathinfo($csv, PATHINFO_EXTENSION));

 if(!empty($csvfile)){

 if(in_array($ext, $allowedfile)){
   $opencsv = fopen($tmp_csv, 'r');
    fgetcsv($opencsv);

   while(($result = fgetcsv($opencsv)) !== FALSE){
     $name = $result[0];

     $check = ("SELECT fullname FROM authors WHERE fullname = '".$result[0]."'");
     $stmt = $db->connection->prepare($check);
     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);

     if($row > 0){
       $update = ("UPDATE authors SET fullname = '".$name."' ");
       $stmt = $db->connection->prepare($update);
       $stmt->execute();
     }
     else
     {
      $insert = ("INSERT INTO authors (fullname) VALUES ('".$name."')");
      $stmt = $db->connection->prepare($insert);
      $stmt->execute();
      
      if($stmt){
        echo 'success';
      }
     }
   }
   fclose($opencsv);
 }
 else{
  echo ('invalid');
 }
 }




?>
