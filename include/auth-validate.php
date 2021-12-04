<?php

// Validates for authentication
if (!isset($_SESSION['loggedin'])) {
    header('location: index.php');
}