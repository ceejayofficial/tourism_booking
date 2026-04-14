<?php
session_start();

include __DIR__ . '/../includes/db.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// VALIDATION
if ($name == "" || $email == "" || $password == "") {
    header("Location: ../auth/signup.php?error=empty");
    exit();
}

// CHECK EMAIL EXISTS
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: ../auth/signup.php?error=exists");
    exit();
}

// HASH PASSWORD
$hashed = password_hash($password, PASSWORD_BCRYPT);

// INSERT USER
$stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss", $name, $email, $hashed);

if ($stmt->execute()) {

    header("Location: ../login.php?success=1");

    exit();

} else {

    header("Location: ../auth/signup.php?error=db");
    exit();
}
?>