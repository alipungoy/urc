
<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();
$return_arr = array();


$file = fopen("./assets/test.csv","r");
while(! feof($file))
  {
    
  }
fclose($file);
    
?>