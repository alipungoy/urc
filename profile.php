<!DOCTYPE html>
<html>

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
?>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/profile.html');
?>
    </main>
</body>

</html>