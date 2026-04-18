<?php
include __DIR__ . '/../includes/auth.php';
include __DIR__ . '/../includes/db.php';
requireLogin();

/* ===================== STATS ===================== */

// Trips
$tripsCount = $conn->query("SELECT COUNT(*) AS total FROM trips")->fetch_assoc()['total'];

// Bookings
$bookingsCount = $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()['total'];

// Users
$usersCount = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];

// Revenue (sum only paid bookings)
$revenueQuery = $conn->query("
    SELECT SUM(amount) AS total
    FROM bookings
    WHERE status = 'paid'
");
$revenue = $revenueQuery->fetch_assoc()['total'] ?? 0;

/* ===================== RECENT BOOKINGS ===================== */

$recentBookings = $conn->query("
    SELECT b.*, u.name AS user_name, t.title AS trip_title
    FROM bookings b
    LEFT JOIN users u ON b.user_id = u.id
    LEFT JOIN trips t ON b.trip_id = t.id
    ORDER BY b.created_at DESC
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Curaters</title>

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

    <!-- TOP BAR -->
    <div class="flex items-center justify-between px-6 py-5 border-b">
        <h2 class="text-xl font-light">Dashboard</h2>
        <div class="text-sm text-gray-500">Admin Panel</div>
    </div>

    <div class="p-6 space-y-8">

        <!-- ================= STATS ================= -->
        <div class="grid md:grid-cols-4 gap-6">

            <div class="border rounded-xl p-5">
                <p class="text-sm text-gray-500">Total Trips</p>
                <p class="text-2xl font-light mt-2"><?= $tripsCount ?></p>
            </div>

            <div class="border rounded-xl p-5">
                <p class="text-sm text-gray-500">Bookings</p>
                <p class="text-2xl font-light mt-2"><?= $bookingsCount ?></p>
            </div>

            <div class="border rounded-xl p-5">
                <p class="text-sm text-gray-500">Users</p>
                <p class="text-2xl font-light mt-2"><?= $usersCount ?></p>
            </div>

            <div class="border rounded-xl p-5">
                <p class="text-sm text-gray-500">Revenue</p>
                <p class="text-2xl font-light mt-2">
                    $<?= number_format($revenue, 2) ?>
                </p>
            </div>

        </div>

        <!-- ================= QUICK ACTIONS ================= -->
        <div class="grid md:grid-cols-3 gap-6">

            <a href="add-trip.php" class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-lg font-light">Add New Trip</h3>
                <p class="text-sm text-gray-500 mt-2">Create and publish a new travel experience</p>
            </a>

            <a href="trips.php" class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-lg font-light">Manage Trips</h3>
                <p class="text-sm text-gray-500 mt-2">Edit or delete existing trips</p>
            </a>

            <a href="bookings.php" class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-lg font-light">View Bookings</h3>
                <p class="text-sm text-gray-500 mt-2">Manage customer reservations</p>
            </a>

        </div>

        <!-- ================= RECENT BOOKINGS ================= -->
        <div class="border rounded-xl p-6">

            <h3 class="text-lg font-light mb-4">Recent Bookings</h3>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="py-2">User</th>
                            <th class="py-2">Trip</th>
                            <th class="py-2">Amount</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Date</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700">

                    <?php if ($recentBookings->num_rows > 0): ?>
                        <?php while ($row = $recentBookings->fetch_assoc()): ?>
                            <tr class="border-b">
                                <td class="py-3"><?= htmlspecialchars($row['user_name']) ?></td>
                                <td><?= htmlspecialchars($row['trip_title']) ?></td>
                                <td>$<?= number_format($row['amount'], 2) ?></td>
                                <td class="<?= $row['status'] == 'paid' ? 'text-green-600' : 'text-yellow-600' ?>">
                                    <?= ucfirst($row['status']) ?>
                                </td>
                                <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-400">
                                No bookings found
                            </td>
                        </tr>
                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

</div>

</body>
</html>