<?php
require_once('./include/navheader.php');
require_once('./include/sidebar.php');

// Check if usertype is admin
if($_SESSION['user_type'] !== 'Admin') {
  header("location: ./index.php");  
}
  require_once('./include/navbar-auth.php');
  require_once('./pages/sidenav.html');
  require_once('./include/footer.html')
?>
