<?php
session_start();
include __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/auth.php';

requireLogin();

// GET FORM DATA
$section = trim($_POST['section']);
$title   = trim($_POST['title']);
$content = trim($_POST['content']);

// VALIDATION
if ($section == "" || $title == "" || $content == "") {
    header("Location: ../admin/content.php?error=empty");
    exit();
}

// OPTIONAL: ALLOW ONLY SAFE SECTIONS
$allowed = ['vision', 'mission', 'about', 'footer', 'hero'];

if (!in_array($section, $allowed)) {
    header("Location: ../admin/content.php?error=invalid_section");
    exit();
}

// CHECK IF SECTION ALREADY EXISTS (1 PER SECTION RULE)
$check = $conn->prepare("SELECT id FROM site_content WHERE section=?");
$check->bind_param("s", $section);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: ../admin/content.php?error=exists");
    exit();
}

// INSERT CONTENT
$stmt = $conn->prepare("
    INSERT INTO site_content (section, title, content)
    VALUES (?, ?, ?)
");

$stmt->bind_param("sss", $section, $title, $content);

if ($stmt->execute()) {
    header("Location: ../admin/content.php?success=1");
    exit();
} else {
    header("Location: ../admin/content.php?error=db");
    exit();
}
?>