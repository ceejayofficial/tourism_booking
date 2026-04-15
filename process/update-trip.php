<?php
session_start();
include __DIR__ . '/../includes/db.php';

$id = $_POST['id'];

$title = $_POST['title'];
$description = $_POST['description'];
$destination = $_POST['destination'];
$price = $_POST['price'];
$status = $_POST['status'];

// UPDATE TRIP
$stmt = $conn->prepare("UPDATE trips SET title=?, description=?, destination=?, price=?, status=? WHERE id=?");
$stmt->bind_param("sssisi", $title, $description, $destination, $price, $status, $id);
$stmt->execute();

// OPTIONAL: ADD NEW IMAGES
if (!empty($_FILES['images']['tmp_name'][0])) {

    $count = count($_FILES['images']['tmp_name']);

    if ($count <= 2) {

        for ($i = 0; $i < $count; $i++) {

            $img = file_get_contents($_FILES['images']['tmp_name'][$i]);
            $type = $_FILES['images']['type'][$i];

            $stmt = $conn->prepare("INSERT INTO trip_images (trip_id, image, image_type) VALUES (?, ?, ?)");
            $null = NULL;
            $stmt->bind_param("ibs", $id, $null, $type);
            $stmt->send_long_data(1, $img);
            $stmt->execute();
        }
    }
}

header("Location: ../admin/trips.php?updated=1");
exit();
?>