<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
     echo json_encode('false');

} else {
       echo json_encode('true');
}
