<!DOCTYPE html>
<html>

<link href="vendor/fullcalendar.min.css" rel="stylesheet">

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
  ?>

<script src="vendor/js/moment.min.js"></script>
<script src="vendor/fullcalendar.min.js"></script>
<script src="vendor/bootbox.min.js"></script>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/events-creation.html');

?>
    </main>
</body>

</html>