<?php require_once('./include/header.php');

  if(!isset($_SESSION['loggedin'])){
    header('location: index.php');
  }
?>
<?php
 require_once('./include/sidebar.php');
 require_once('./include/profile-nav.php');
 require_once('./pages/profile.html');
 require_once('./include/navfooter.php');
?>