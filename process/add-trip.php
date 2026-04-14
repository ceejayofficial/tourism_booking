<?php
session_start();
include __DIR__ . '/../includes/db.php';

// FORM DATA
$title = $_POST['title'];
$description = $_POST['description'];
$destination = $_POST['destination'];
$price = $_POST['price'];
$max = $_POST['max_people'] ?: NULL;
$min = $_POST['min_people'] ?: NULL;
$status = $_POST['status'];

// INSERT TRIP
$stmt = $conn->prepare("INSERT INTO trips (title, description, destination, price, max_people, min_people, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdiis", $title, $description, $destination, $price, $max, $min, $status);

if ($stmt->execute()) {

    $trip_id = $stmt->insert_id;

    // HANDLE IMAGES (MAX 2)
    if (!empty($_FILES['images']['tmp_name'][0])) {

        $total = count($_FILES['images']['tmp_name']);

        if ($total > 2) {
            header("Location: ../admin/add-trip.php?error=max2");
            exit();
        }

        for ($i = 0; $i < $total; $i++) {

            $imageData = file_get_contents($_FILES['images']['tmp_name'][$i]);
            $imageType = $_FILES['images']['type'][$i];

            $imgStmt = $conn->prepare("INSERT INTO trip_images (trip_id, image, image_type) VALUES (?, ?, ?)");
            $imgStmt->bind_param("ibs", $trip_id, $null, $imageType);

            $null = NULL;
            $imgStmt->send_long_data(1, $imageData);
            $imgStmt->execute();
        }
    }

    header("Location: ../admin/trips.php?success=1");
    exit();

} else {
    header("Location: ../admin/add-trip.php?error=db");
    exit();
}
?>