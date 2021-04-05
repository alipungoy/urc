<?php
require_once('./include/header.php');

// Check if usertype is admin
if($_SESSION['user_type'] !== 'admin') {
  header("location: ./index.php");  
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
<body>
<?php
  require_once('./include/navbar.php');
  require_once('./pages/dashboard.html');
  require_once('./include/footer.html');
?>
</body>
</html>