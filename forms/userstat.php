<?php
include('../db/connection.php');
$db = new db();
if(!isset($_SESSION)) session_start();



$vst_id = '-vst-';         // an identifier to know that it is a visitor, not logged user
$uvon = isset($_SESSION['username']) ? $_SESSION['username'] : $_SERVER['SERVER_ADDR']. $vst_id;

$rgxvst = '/^([0-9\.]*)'. $vst_id. '/i';         // regexp to recognize the rows with visitors
$dt = time();                                    // current timestamp
$timeon = 20;             // number of secconds to keep a user online
$nrvst = 0;                                     // to store the number of visitors
$nrusr = 0;                                     // to store the number of usersrs
$usron = '';                                    // to store the name of logged users



// Define and execute the Delete, Insert/Update, and Select queries
$delete = "DELETE FROM userson WHERE dt <". ($dt - $timeon);
$insert = "INSERT INTO userson (uvon, dt) VALUES ('".$uvon."', '".$dt."') ON DUPLICATE KEY UPDATE dt = '".$dt."' ";
$select = "SELECT * FROM userson";

// Execute each query
if(!$db->connection->query($delete)) echo 'Error: ';
if(!$db->connection->query($insert)) echo 'Error: ';
$result = $db->connection->prepare($select);
$result->execute();

// if the $result contains at least one row
if ($result->rowCount() > 0) {
  // traverse the sets of results and set the number of online visitors and users ($nrvst, $nrusr)
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    if(preg_match($rgxvst, $row['uvon'])) $nrvst++;       // increment the visitors
    else {
      $nrusr++;                   // increment the users
      $usron .= '<br/> - <i>'.$row['uvon']. '</i>';          // stores the user's name
    }
  }
}

$reout = '<div id="uvon"><h4>Online: '. ($nrusr+$nrvst). '</h4>Visitors: '. $nrvst. '<br/>Users: '. $nrusr. $usron. '</div>';

// if access from <script>, with GET 'uvon=showon', adds the string to return into a JS statement
// in this way the script can also be included in .html files

if(isset($_GET['uvon']) && $_GET['uvon']=='showon') $reout = "document.write('$reout');";

echo $reout;             // output /display the result
?>