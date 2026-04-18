<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();

include __DIR__ . '/../includes/db.php';

// FETCH TRIPS + THEIR IMAGE (CORRECT JOIN)
$result = $conn->query("
    SELECT 
        trips.*,
        trip_images.image,
        trip_images.image_type
    FROM trips
    LEFT JOIN trip_images 
        ON trip_images.trip_id = trips.id
    GROUP BY trips.id
    ORDER BY trips.id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Trips | Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<div class="flex min-h-screen">

    <?php include 'components/sidebar.php'; ?>

    <main class="flex-1">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-5 border-b">
            <h2 class="text-xl font-light text-black">Manage Trips</h2>

            <a href="add-trip.php"
               class="bg-black text-white px-4 py-2 rounded-full text-xs uppercase tracking-widest hover:opacity-90">
               + Add Trip
            </a>
        </div>

        <!-- TABLE -->
        <div class="p-6">
            <div class="overflow-x-auto border rounded-xl">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600 text-left">
                        <tr>
                            <th class="p-4">Image</th>
                            <th class="p-4">Title</th>
                            <th class="p-4">Price</th>
                            <th class="p-4">Slots</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while($row = $result->fetch_assoc()): ?>

                        <tr class="border-t">

                            <!-- IMAGE -->
                            <td class="p-4">
                                <?php if (!empty($row['image'])): ?>
                                    <img 
                                        src="data:<?php echo $row['image_type']; ?>;base64,<?php echo base64_encode($row['image']); ?>" 
                                        class="w-16 h-12 object-cover rounded"
                                    >
                                <?php else: ?>
                                    <div class="w-16 h-12 bg-gray-100 flex items-center justify-center text-xs text-gray-400 rounded">
                                        No Image
                                    </div>
                                <?php endif; ?>
                            </td>

                            <!-- TITLE -->
                            <td class="p-4">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </td>

                            <!-- PRICE -->
                            <td class="p-4">
                                $<?php echo number_format($row['price'], 2); ?>
                            </td>

                            <!-- SLOTS -->
                            <td class="p-4">
                                <?php echo $row['max_people'] ?? '—'; ?>
                            </td>

                            <!-- STATUS -->
                            <td class="p-4">
                                <span class="text-green-600 text-xs">
                                    <?php echo $row['status'] ?? 'Active'; ?>
                                </span>
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-4 space-x-2">

                                <a href="edit-trip.php?id=<?php echo $row['id']; ?>"
                                   class="text-blue-600 text-xs hover:underline">
                                   Edit
                                </a>

                                <a href="../process/delete-trip.php?id=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Delete this trip?')"
                                   class="text-red-600 text-xs hover:underline">
                                   Delete
                                </a>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>
        </div>

    </main>

</div>

</body>
</html>