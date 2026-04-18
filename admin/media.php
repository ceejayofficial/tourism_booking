<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();

include __DIR__ . '/../includes/db.php';

/*
-----------------------------------
FETCH IMAGES THE SAME WAY AS TRIPS
-----------------------------------
*/
$sql = "
SELECT 
    ti.id,
    ti.trip_id,
    ti.image,
    ti.image_type,
    t.title
FROM trip_images ti
LEFT JOIN trips t ON ti.trip_id = t.id
ORDER BY ti.id DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Media Library | Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
    background: #fff;
}
</style>
</head>

<body>

<div class="flex min-h-screen bg-white">

<?php include 'components/sidebar.php'; ?>

<!-- MAIN -->
<main class="flex-1 bg-white">

    <!-- TOP BAR -->
    <div class="flex items-center justify-between px-6 py-5 border-b bg-white">

        <h2 class="text-xl font-light text-black">Media Library</h2>

        <div class="text-sm text-gray-500">
            All Trip Images (BLOB Storage)
        </div>

    </div>

    <!-- GRID -->
    <div class="p-6 bg-white">

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php while($row = $result->fetch_assoc()): ?>

            <div class="bg-white border rounded-xl overflow-hidden shadow-sm">

                <!-- IMAGE (DIRECT BLOB RENDER - SAME AS TRIPS) -->
                <?php if (!empty($row['image'])): ?>
                    <img src="data:<?= htmlspecialchars($row['image_type']); ?>;base64,<?= base64_encode($row['image']); ?>"
                         class="w-full h-44 object-cover bg-gray-100">
                <?php else: ?>
                    <div class="w-full h-44 flex items-center justify-center text-gray-400 text-xs">
                        No Image
                    </div>
                <?php endif; ?>

                <!-- INFO -->
                <div class="p-3">

                    <p class="text-sm font-medium text-black">
                        <?= htmlspecialchars($row['title'] ?? 'Untitled Trip'); ?>
                    </p>

                    <p class="text-xs text-gray-500 mt-1">
                        Image ID: <?= $row['id']; ?>
                    </p>


                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>

</main>

</div>

</body>
</html>