<!DOCTYPE html>
<html>
<?php

  require_once('./include/header.php');

  if(!isset($_SESSION['loggedin'])){
    header('location: index.php');
  }
?>

<link rel="stylesheet" type="text/css" href="vendor/css/sb-admin-2.min.css">

<body>
    <?php
  require_once('./include/sidebar.php');
  require_once('./include/navbar-auth.php');
  require_once('./pages/settings.html');
  require_once('./include/footer.html');
?>
</body>

</html>