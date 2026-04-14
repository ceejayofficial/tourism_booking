<?php
session_start();

include __DIR__ . '/../includes/db.php';

$email = trim($_POST['email']);
$password = $_POST['password'];

// GET USER
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

// VERIFY LOGIN
if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user_id'] = $user['id'];

    // ✅ SUCCESS → GO TO ADMIN DASHBOARD
    header("Location: ../admin/index.php");

    exit();

} else {

    // ❌ FAILED LOGIN
    header("Location: ../login.php?error=invalid");
    exit();
}
?>