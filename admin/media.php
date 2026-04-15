<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();

include __DIR__ . '/../includes/db.php';

// FETCH IMAGES WITH TRIP INFO
$sql = "
SELECT 
    ti.id,
    ti.trip_id,
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
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<div class="flex min-h-screen">

<?php include 'components/sidebar.php'; ?>

    <!-- MAIN -->
    <main class="flex-1">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between px-6 py-5 border-b">

            <h2 class="text-xl font-light">Media Library</h2>

            <div class="text-sm text-gray-500">
                All Trip Images (BLOB Storage)
            </div>

        </div>

        <!-- GRID -->
        <div class="p-6">

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <?php while($row = $result->fetch_assoc()): ?>

                <div class="border rounded-xl overflow-hidden">

                    <!-- IMAGE -->
                    <img src="../get-image.php?id=<?php echo $row['id']; ?>"
                         class="w-full h-40 object-cover">

                    <!-- INFO -->
                    <div class="p-3">

                        <p class="text-sm font-medium text-black">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Image ID: <?php echo $row['id']; ?>
                        </p>

                        <!-- ACTION -->
                        <a href="../process/delete-image.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Delete this image?')"
                           class="text-xs text-red-600 mt-2 inline-block">
                            Delete
                        </a>

                    </div>

                </div>

                <?php endwhile; ?>

            </div>

        </div>

    </main>

</div>

</body>
</html>