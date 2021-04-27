<?php
date_default_timezone_set("Asia/Manila");
include('../db/connection.php');
include('./notifications.php');
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$lName = $_SESSION['last_name'];
$status = 'pending';
$author = $_SESSION['first_name'].' '.$_SESSION['last_name'];
$DATE = date("y-m-d h:i:sa");
$notifType = '1';
$ToUSER = 'Admin';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $title = $_POST['title'];
  $funding = $_POST['funding'];
  $fileName = $lName.'-'.$_FILES["fileToUpload"]["name"];
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  /*if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  } */
  if ($_FILES['fileToUpload']['type'] == "application/pdf") {
    $source_file = $target_file.'-'.$userID.'_'.$lName;
    $dest_file = "../uploads/".$target_file.'-'.$userID.'_'.$lName;
}
 $sql = ("SELECT * FROM proposal LEFT JOIN urc_documents ON proposal.proposalID = urc_documents.proposalID");
 $stmt = $db->connection->prepare($sql);
 $stmt->execute();
 $row=$stmt->fetch(PDO::FETCH_ASSOC);

  if ($fileName == $row['filename']) {
    echo "<script>alert('Existing Filename')</script>";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($FileType != "pdf" ) {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/".$lName.'-'.$_FILES["fileToUpload"]["name"])) {
      $sql = ("INSERT INTO proposal (userid, title, author, funding, status) VALUES ('".$userID."', '".$title."', '".$author."', '".$funding."', '".$status."')");
       $stmt = $db->connection->prepare($sql);
       $stmt->execute();
       $lastID = $db->connection->lastInsertId();
       if($stmt){
         $sql2 = ("INSERT INTO urc_documents (filename, proposalID, subDate) VALUES ('".$fileName."', '".$lastID."', '".$DATE."')");
         $stmt = $db->connection->prepare($sql2);
         $stmt->execute();

         if($stmt){
            $sql3 = ("INSERT INTO urc_notification (fromUser, toUser, notifMsg, notifDate, notifTypeID) VALUES
             ('".$userID."', '".$ToUSER."', '".$upload."', '".$DATE."', '".$notifType."')");
            $stmt = $db->connection->prepare($sql3);
            $stmt->execute();
           }
         
       }
      echo "The file ". htmlspecialchars($fileName). " has been uploaded.";

    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

// Check if file already exists

?>

<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="funding">Funding Type:</label>
  <select name="funding" id="funding">
    <option value="external">external funding</option>
    <option value="internal">internal funding</option>
  </select><br>
  <input type="text" name="title" id="" placeholder="Title of Journal"><br>
  <input type="file" name="fileToUpload" id="fileToUpload" class="hidden">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
