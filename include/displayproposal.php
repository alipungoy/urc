<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];

$searchArray = array();


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (first_name LIKE :first_name or 
        email LIKE :email OR 
        classification LIKE :classification ) ";
   $searchArray = array( 
        'first_name'=>"%$searchValue%", 
        'email'=>"%$searchValue%",
        'classification'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $db->connection->prepare("SELECT COUNT(*) AS allcount FROM proposal ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt =  $db->connection->prepare("SELECT COUNT(*) AS allcount FROM proposal WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

$stmt =  $db->connection->prepare("SELECT * FROM proposal WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
  $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach($empRecords as $row){
  $data[] = array(
     "title"=>$row['title'],
     "funding"=>$row['funding'],
     "status"=>$row['status'],
     "button"=> "<button id='testbtn' class='btn btn-success' data-toggle='modal' data-target='#testmodal' value=".$row['proposalID']." PID=".$row['proposalID'].">Assign Reviewer</button>"
  );
}


#response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data

);
    
echo json_encode($response);
    
?>