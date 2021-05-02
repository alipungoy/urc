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
$stmt = $db->connection->prepare("SELECT COUNT(title) AS allcount FROM proposal");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt =  $db->connection->prepare("SELECT COUNT(title) as allcount FROM proposal WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

$stmt =  $db->connection->prepare("SELECT proposal.proposalID, proposal.title, proposal.status FROM proposal WHERE 1 ".$searchQuery." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
  $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();


$data = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  $data[] = array(
    "button"=> '<button class="btn btn-primary" id="showMore" value="'.$row['proposalID'].'"> + </button>', 
     "title"=>$row['title'],
     "status"=>$row['status'],
     "assign"=>'<button class="btn btn-success" id="revAssign" PID="'.$row['proposalID'].'">Assign Reviewer</button>',
     "approve"=>'<button class="btn btn-success" id="approve" value="'.$row['proposalID'].'">Approve</button>',
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