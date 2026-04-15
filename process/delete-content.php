<?php
session_start();
include __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/auth.php';

requireLogin();

// GET ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// VALIDATION
if ($id <= 0) {
    header("Location: ../admin/content.php?error=invalid");
    exit();
}

// DELETE CONTENT
$stmt = $conn->prepare("DELETE FROM site_content WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../admin/content.php?deleted=1");
    exit();
} else {
    header("Location: ../admin/content.php?error=db");
    exit();
}
?>