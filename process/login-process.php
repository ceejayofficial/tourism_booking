<?php
include '../includes/auth.php';
redirectIfLoggedIn();
?>

<?php
include './includes/db.php';
session_start();

$email = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user_id'] = $user['id'];

    header("Location: ./admin/index.php");
    exit();

} else {
    header("Location: login.php?error=invalid");
    exit();
}
?>