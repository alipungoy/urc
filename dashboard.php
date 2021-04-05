<?php
require_once('./include/header.php');
if(!isset($_SESSION['loggedin']) || ($_SESSION['usertype'] !== 'admin')){
  header("location: ./index.php");
};
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
<body>
<?php
  require_once('./include/navbar.php');
  require_once('./pages/sidebar.html');
  require_once('./include/footer.html');
?>
</body>
</html>