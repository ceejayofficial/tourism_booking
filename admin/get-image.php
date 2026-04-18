<?php

include __DIR__ . '/includes/db.php';

if (!isset($_GET['id'])) {
    exit;
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT image, image_type FROM trip_images WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    header("Content-Type: " . $row['image_type']);
    echo $row['image'];

} else {

    // fallback image
    header("Content-Type: image/png");
    readfile(__DIR__ . '/assets/no-image.png');
}