<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>

<body class="bg-white">

<!-- LAYOUT -->
<div class="flex min-h-screen">

<?php include 'components/sidebar.php'; ?>

    <!-- MAIN -->
    <main class="flex-1">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between px-6 py-5 border-b">

            <h2 class="text-xl font-light text-black">
                Dashboard
            </h2>

            <div class="text-sm text-gray-500">
                Admin Panel
            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-6 space-y-8">

            <!-- STATS -->
            <div class="grid md:grid-cols-4 gap-6">

                <div class="border rounded-xl p-5">
                    <p class="text-sm text-gray-500">Total Trips</p>
                    <p class="text-2xl font-light text-black mt-2">12</p>
                </div>

                <div class="border rounded-xl p-5">
                    <p class="text-sm text-gray-500">Bookings</p>
                    <p class="text-2xl font-light text-black mt-2">58</p>
                </div>

                <div class="border rounded-xl p-5">
                    <p class="text-sm text-gray-500">Users</p>
                    <p class="text-2xl font-light text-black mt-2">120</p>
                </div>

                <div class="border rounded-xl p-5">
                    <p class="text-sm text-gray-500">Revenue</p>
                    <p class="text-2xl font-light text-black mt-2">$8,450</p>
                </div>

            </div>

            <!-- QUICK ACTIONS -->
            <div class="grid md:grid-cols-3 gap-6">

                <a href="add-trip.php" class="border rounded-xl p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-light text-black">Add New Trip</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Create and publish a new travel experience
                    </p>
                </a>

                <a href="trips.php" class="border rounded-xl p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-light text-black">Manage Trips</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Edit or delete existing trips
                    </p>
                </a>

                <a href="bookings.php" class="border rounded-xl p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-light text-black">View Bookings</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Manage customer reservations
                    </p>
                </a>

            </div>

            <!-- RECENT BOOKINGS -->
            <div class="border rounded-xl p-6">

                <h3 class="text-lg font-light text-black mb-4">
                    Recent Bookings
                </h3>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left">

                        <thead class="border-b text-gray-500">
                            <tr>
                                <th class="py-2">User</th>
                                <th class="py-2">Trip</th>
                                <th class="py-2">Date</th>
                                <th class="py-2">Status</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-700">

                            <tr class="border-b">
                                <td class="py-3">John Doe</td>
                                <td>Bali Escape</td>
                                <td>2026-05-12</td>
                                <td class="text-green-600">Paid</td>
                            </tr>

                            <tr class="border-b">
                                <td class="py-3">Ama Mensah</td>
                                <td>Zanzibar Tour</td>
                                <td>2026-06-01</td>
                                <td class="text-yellow-600">Pending</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>