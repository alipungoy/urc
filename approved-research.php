<!DOCTYPE html>
<html>

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/approved-research.html');
?>
    </main>
</body>

</html>