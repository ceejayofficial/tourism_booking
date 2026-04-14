<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
 ONLY protect pages that require login
*/
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /auth/login.php");
        exit();
    }
}

/*
 Prevent logged-in users from seeing login/signup again
*/
function redirectIfLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        header("Location: /index.php");
        exit();
    }
}
?>