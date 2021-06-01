<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "research_center_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//include ('../db/connection.php');
//$db = new db();
//$_SESSION['get_token'] = $_GET['token'];
/*$link = $_SERVER['HTTP_HOST']. '/'. $_SERVER['REQUEST_URI'];;
echo $link;
$token = "82da150ddfd65c4667d22c5a83667aaa2d69fcf5617a03cae5b7093f509c602649425c1593f789492e9c3584cef6f514443a";*/
if(isset($_POST['submit'])){
   $sql = "UPDATE user SET verified = '1' 
    WHERE token ='".$_GET['token']."'";
    if($conn->query($sql) === TRUE){
        echo "update successful";
    }
   // echo "update successful";
}

//$sql = ("UPDATE FROM users SET verified = 1 WHERE token=$_SESSION['get_token']");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="confirmation.php?token=<?php echo $_GET['token'];?>" method="POST">
        <input type="submit" name="submit" />Activate Now
    </form>
</body>
</html>