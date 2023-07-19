<?php
require_once('./include/header.php');
require_once('./include/auth-validate.php');
?>
<!DOCTYPE html>
<html>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<body>
  <main>
    <?php
    require_once('./include/auth-sidebar.php');
    require_once('./pages/submission.html');
    ?>
  </main>
</body>

</html>