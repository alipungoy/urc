<!DOCTYPE html>
<html>

<link href="libs/fullcalendar.min.css" rel="stylesheet">

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
  ?>

<script src="libs/js/moment.min.js"></script>
<script src="libs/fullcalendar.min.js"></script>
<script src="libs/bootbox.min.js"></script>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/schedule-presentation.html');

?>
    </main>
</body>

</html>