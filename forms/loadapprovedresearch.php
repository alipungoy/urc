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
if ($searchValue != '') {
    $searchQuery = " AND (title LIKE :title OR 
        funding LIKE :funding";
    $searchArray = array(
        'title'=>"%$searchValue%",
        'funding'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $db->connection->prepare("SELECT COUNT(status) AS allcount FROM proposal ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt =  $db->connection->prepare("SELECT COUNT(status) AS allcount FROM proposal WHERE status = 'Reviewed For Presentation' && 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

$stmt =  $db->connection->prepare("SELECT * FROM proposal WHERE status = 'Reviewed For Presentation' ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach ($searchArray as $key=>$search) {
    $stmt->bindValue(':'.$key, $search, PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $row) {
    $data[] = array(
     "title"=>$row['title'],
     "funding"=>$row['funding'],
     "approvalDate"=>$row['approvalDate'],
     "button"=> '<button class="btn btn-outline-secondary btn-sm" id="apprvdBtn" value='.$row['proposalID'].'> <i class="bi-calendar-event me-2"></i> Schedule for Presentation</button>'
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
