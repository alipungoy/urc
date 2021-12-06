<!DOCTYPE html>
<html>

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/dashboard.html');
?>
    </main>
</body>

</html>