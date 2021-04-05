<?php
include('../db/connection.php');
$db = new db();

if(isset($_POST['view'])){
// update notifications to seen
if($_POST["view"] != '')
  {
   $update = ("UPDATE notification SET status=1 WHERE status=0");
   $stmt = $db->connection->prepare($update);
   $stmt->execute();
 }

// load notifications
$sql = ("SELECT user.username, notification.notifMsg, notification.notifdate, notiftype.type FROM ((notification LEFT JOIN
 notiftype ON notification.notifTypeID=notiftype.notifTypeID) LEFT JOIN user on notification.fromUser=user.userID) ORDER BY notifdate DESC LIMIT 5");
$stmt =$db->connection->prepare($sql);
$stmt->execute();  
$notif ="";
if($stmt->rowCount() > 0){

  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $notif .='
    <a class="dropdown-item d-flex align-items-center" id="notif" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div class="notif">
                        <div class="small text-gray-500">'.$row['notifdate'].'</div>
                        <span class="font-weight-bold">'.$row['notifMsg'].'</span>
                        </div>
                    </a>
    ';
} 
}
else
{
  $notif .= ' <a class="dropdown-item text-center small text-gray-500" href="#">No new notification</a>';
}


$sql2 = ("SELECT * FROM notification WHERE status=0");
$stmt = $db->connection->prepare($sql2);
$stmt->execute();
$count = $stmt->rowCount();

$data = array(
  'notif' => $notif,
  'unseen_notif' => $count
);
echo json_encode($data);
}

?>