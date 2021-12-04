<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="vendor/css/sb-admin-2.min.css">

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
?>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/edit-profile.html');
?>
    </main>
</body>

</html>