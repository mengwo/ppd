<?php
session_start();

// Check if the session variable is not set
if (!isset($_SESSION['selectedLink'])) {
    // Set a default link
    $_SESSION['selectedLink'] = 'dashboard';
}
?>