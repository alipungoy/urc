<?php
require_once('./include/header.php');

// Check if usertype is admin

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>
<?php
  require_once('./include/navbar.php');
?>
  <div>
  <?php 

  require_once('./pages/profile.html');
  ?>
</div>
<?php
  require_once('./include/footer.html');
?>
</body>
</html>