<?php
session_start();
include __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/auth.php';

requireLogin();

// GET DATA
$id      = isset($_POST['id']) ? intval($_POST['id']) : 0;
$title   = trim($_POST['title']);
$content = trim($_POST['content']);

// VALIDATION
if ($id <= 0 || $title == "" || $content == "") {
    header("Location: ../admin/content.php?error=empty");
    exit();
}

// UPDATE QUERY
$stmt = $conn->prepare("
    UPDATE site_content 
    SET title = ?, content = ? 
    WHERE id = ?
");

$stmt->bind_param("ssi", $title, $content, $id);

if ($stmt->execute()) {
    header("Location: ../admin/content.php?updated=1");
    exit();
} else {
    header("Location: ../admin/content.php?error=db");
    exit();
}
?>