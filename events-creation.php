<!DOCTYPE html>
<html>

<link href="vendor/fullcalendar.min.css" rel="stylesheet">

<?php
  require_once('./include/header.php');
  require_once('./include/auth-validate.php');
  ?>

<link rel="stylesheet" type="text/css" href="css/pages/editor.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="libs/wysiwyg-editor/css/froala_editor.min.css">
<link rel="stylesheet" type="text/css" href="libs/wysiwyg-editor/css/plugins/image.min.css">
<link rel="stylesheet" type="text/css" href="libs/wysiwyg-editor/css/plugins/image_manager.min.css">
<script src="libs/js/moment.min.js"></script>
<script src="libs/fullcalendar.min.js"></script>
<script src="libs/bootbox.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script src="libs/wysiwyg-editor/js/froala_editor.min.js"></script>
<script src="libs/wysiwyg-editor/js/plugins/image.min.js"></script>
<script src="libs/wysiwyg-editor/js/plugins/align.min.js"></script>
<script src="libs/wysiwyg-editor/js/plugins/draggable.min.js"></script>

<body>
    <main>
        <?php
 require_once('./include/auth-sidebar.php');
 require_once('./pages/events-creation.html');

?>
    </main>
</body>

</html>