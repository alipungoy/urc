<?php
include('../db/connection.php');
$db = new db();

$record_per_page = 5;
$page = '';
$output = '';
if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1)*$record_per_page;
$query = "SELECT * FROM events ORDER BY id DESC LIMIT $start_from, $record_per_page";
$stmt = $db->connection->prepare($query);
$stmt->execute();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $output .='<div class="row align-items-center event-block no-gutters margin-40px-bottom">
     <div class="col-lg-5 col-sm-12">
         <div class="position-relative">
             <img src="../assets/images/download.jpg" width="450px" height="250px" alt="">
         </div>
     </div>
     <div class="col-lg-7 col-sm-12">
     <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
         <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500"><a href="event-details.html" class="text-theme-color">'.$row['event_title'].'</a></h5>
         <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
             <li><i class="far fa-clock margin-10px-right"></i>'.$row['event_from_time'].'-'.$row['event_to_time'].'</li>
             <li><i class="fas fa-user margin-5px-right"></i></li>
         </ul>
         <p>'.$row['events_information'].'</p>
         <a class="butn small margin-10px-top md-no-margin-top" href="event-details.html">Read More <i class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
     </div>
 </div>
 </div> <br>';
}
$back = ($page - 1);
if ($page == 1) {
    $output .= '<nav aria-label="..." class="d-flex justify-content-center"><ul class="pagination">
<li class="page-item mr-2 disabled"><span class="page-link back"  id='.$back.'>Previous</span></li>';
} else {
    $output .= '<nav aria-label="..." class="d-flex justify-content-center"><ul class="pagination">
<li class="page-item mr-2"><span class="page-link back"  id='.$back.'>Previous</span></li>';
}
$page_query = "SELECT * FROM events ORDER BY id DESC";
$page_result = $db->connection->prepare($page_query);
$page_result->execute();
$total_records = $page_result->rowCount();
$total_pages = ceil($total_records/$record_per_page);
for ($i=1; $i<=$total_pages; $i++) {
    $output .= '
     <li class="page-item page" id='.$i.'><a class="page-link mr-2" style="cursor:pointer" href="#" id='.$i.'>'.$i.'</a></li>';
}
$next = ($page + 1);
if ($page == $total_pages) {
    $output .= ' <li class="page-item disabled" style="cursor:pointer">
<span class="page-link next" id='.$next.'>Next</span>
</li>
</ul></nav><br /><br />';
} else {
    $output .= ' <li class="page-item" style="cursor:pointer">
  <span class="page-link next" id='.$next.'>Next</span>
  </li>
  </ul></nav><br /><br />';
}
echo $output;
?>



