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
   $searchQuery = " AND (fullname LIKE :fullname or 
        title LIKE :title OR 
        status LIKE :status ) ";
   $searchArray = array( 
        'fullname'=>"%$searchValue%", 
        'title'=>"%$searchValue%",
        'status'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $db->connection->prepare("SELECT COUNT(*) AS allcount FROM( authors Left JOIN proposal_authors ON authors.authorID=proposal_authors.author_id) LEFT JOIN proposal ON proposal_authors.proposal_id=proposal.proposalID ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt =  $db->connection->prepare("SELECT COUNT(*) AS allcount FROM( authors Left JOIN proposal_authors ON authors.authorID=proposal_authors.author_id) LEFT JOIN proposal ON proposal_authors.proposal_id=proposal.proposalID WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

$stmt =  $db->connection->prepare("SELECT proposal.proposalID, proposal.title, proposal.status, authors.fullname FROM( proposal Left JOIN proposal_authors ON proposal.proposalID=proposal_authors.proposal_id) LEFT JOIN authors ON proposal_authors.author_id=authors.authorID  WHERE 1 ".$searchQuery." ORDER BY title LIMIT :limit,:offset");

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
     "fullname" => $row['fullname'],
     "title"=>$row['title'],
     "status"=>$row['status'],
     "id"=>$row['proposalID']
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