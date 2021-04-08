<?php
include("./db/connection.php");
$db = new db();

$sql =("SELECT * FROM proposal");
$stmt = $db->connection->prepare($sql);
$stmt->execute();
 
 
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  $data[] = $row;
}
 
print_r($data);
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
 
 
echo json_encode($results);
?>