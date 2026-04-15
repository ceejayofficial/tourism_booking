<?php
session_start();
include __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/auth.php';

requireLogin();

// GET ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    header("Location: ../admin/trips.php?error=invalid");
    exit();
}

// 1. DELETE IMAGES FIRST (BLOB CLEANUP)
$stmt = $conn->prepare("DELETE FROM trip_images WHERE trip_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

// 2. DELETE TRIP
$stmt = $conn->prepare("DELETE FROM trips WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

// 3. REDIRECT BACK WITH SUCCESS MESSAGE
header("Location: ../admin/trips.php?deleted=1");
exit();
?>