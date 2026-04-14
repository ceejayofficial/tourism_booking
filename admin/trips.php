<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();

include __DIR__ . '/../includes/db.php';

// FETCH TRIPS
$result = $conn->query("SELECT * FROM trips ORDER BY id DESC");
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

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r hidden md:flex flex-col justify-between">

        <div>
            <div class="p-6 border-b">
                <h1 class="text-lg tracking-widest uppercase font-light">
                    Curaters Admin
                </h1>
            </div>

            <nav class="p-6 space-y-4 text-sm">

                <a href="index.php" class="block text-gray-600 hover:text-black">Dashboard</a>
                <a href="trips.php" class="block text-black font-medium">Manage Trips</a>
                <a href="bookings.php" class="block text-gray-600 hover:text-black">Bookings</a>

            </nav>
        </div>

        <div class="p-6 border-t">
            <a href="/auth/logout.php" class="text-sm text-gray-500 hover:text-black">
                Logout
            </a>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between px-6 py-5 border-b">

            <h2 class="text-xl font-light text-black">
                Manage Trips
            </h2>

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

                            <td class="p-4">
                              <img src="../get-image.php?id=<?php echo $image_id; ?>" class="w-16 h-12 object-cover rounded">
                                    </td>

                            <td class="p-4">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </td>

                            <td class="p-4">
                                $<?php echo $row['price']; ?>
                            </td>

                            <td class="p-4">
                                <?php echo $row['max_people'] ?? '—'; ?>
                            </td>

                            <td class="p-4">
                                <span class="text-green-600 text-xs">
                                    <?php echo $row['status'] ?? 'Active'; ?>
                                </span>
                            </td>

                            <td class="p-4 space-x-2">

                                <a href="edit-trip.php?id=<?php echo $row['id']; ?>"
                                   class="text-blue-600 text-xs">
                                   Edit
                                </a>

                                <a href="../process/delete-trip.php?id=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Delete this trip?')"
                                   class="text-red-600 text-xs">
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