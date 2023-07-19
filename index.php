<?php
require_once('./include/header.php');
include('include/verify.php');

$logged = $_SESSION['loggedin'] ?? null;

if($logged === true) {
if(!isVerified($userId)) {
    
    header("Location: verify.php");
    exit();
}
}
?>
<!DOCTYPE html>
<html>


<link rel="stylesheet" type="text/css" href="css/pages/home.css">
<link href="libs/owl.carousel.min.css" rel="stylesheet">
<script src="libs/owl.carousel.min.js"></script>
<link href="libs/owl.theme.default.min.css" rel="stylesheet">

<body>
    <?php
  require_once('./include/navbar.php');
  require_once('./pages/home.html');
  require_once('./include/footer.html');
?>
</body>

</html>