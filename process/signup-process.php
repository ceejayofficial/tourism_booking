<?php
include 'includes/db.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

if ($name == "" || $email == "" || $password == "") {
    header("Location: signup.php?error=empty");
    exit();
}

// CHECK EMAIL
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: signup.php?error=exists");
    exit();
}

// HASH PASSWORD
$hash = password_hash($password, PASSWORD_BCRYPT);

// INSERT
$stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss", $name, $email, $hash);

if ($stmt->execute()) {
    header("Location: login.php?success=1");
} else {
    header("Location: signup.php?error=db");
}
exit();
?>