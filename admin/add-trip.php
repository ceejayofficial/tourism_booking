<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Trip | Admin</title>

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
                <a href="index.php" class="text-gray-600 hover:text-black block">Dashboard</a>
                <a href="trips.php" class="text-black font-medium block">Manage Trips</a>
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

        <!-- TOP -->
        <div class="px-6 py-5 border-b">
            <h2 class="text-xl font-light text-black">Add New Trip</h2>
        </div>

        <!-- FORM -->
        <div class="p-6 max-w-3xl">

            <form action="../process/add-trip.php" method="POST" enctype="multipart/form-data" class="space-y-6">

                <!-- TITLE -->
                <div>
                    <label class="text-sm text-gray-600">Trip Title</label>
                    <input type="text" name="title" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg focus:outline-none focus:border-black">
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="text-sm text-gray-600">Description</label>
                    <textarea name="description" rows="4" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg focus:outline-none focus:border-black"></textarea>
                </div>

                <!-- DESTINATION -->
                <div>
                    <label class="text-sm text-gray-600">Destination</label>
                    <input type="text" name="destination" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <!-- PRICE -->
                <div>
                    <label class="text-sm text-gray-600">Price (per person)</label>
                    <input type="number" name="price" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <!-- PARTICIPANTS -->
                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Max Participants (optional)</label>
                        <input type="number" name="max_people"
                            class="w-full mt-2 border px-4 py-3 rounded-lg">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Min Required (optional)</label>
                        <input type="number" name="min_people"
                            class="w-full mt-2 border px-4 py-3 rounded-lg">
                    </div>

                </div>

                <!-- STATUS -->
                <div>
                    <label class="text-sm text-gray-600">Status</label>
                    <select name="status"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                        <option value="Active">Active</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <!-- IMAGE UPLOAD -->
                <div>
                    <label class="text-sm text-gray-600">
                        Upload Images (Max 2)
                    </label>

                    <input type="file" name="images[]" multiple accept="image/*" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">

                    <p class="text-xs text-gray-400 mt-2">
                        You can upload up to 2 images only
                    </p>
                </div>

                <!-- BUTTON -->
                <div>
                    <button type="submit"
                        class="bg-black text-white px-6 py-3 rounded-full text-sm uppercase tracking-widest hover:opacity-90">
                        Create Trip
                    </button>
                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>