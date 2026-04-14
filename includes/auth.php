<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
 PROTECT ADMIN / PRIVATE PAGES
*/
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
        exit();
    }
}

/*
 BLOCK LOGIN/SIGNUP IF ALREADY LOGGED IN
*/
function redirectIfLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        header("Location: ../admin/index.php");
        exit();
    }
}
?>