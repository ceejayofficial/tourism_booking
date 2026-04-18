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

<?php include 'components/sidebar.php'; ?>

<main class="flex-1 w-full">

    <!-- HEADER -->
    <div class="px-6 py-5 border-b">
        <h2 class="text-xl font-light text-black">Add New Trip</h2>
    </div>

    <!-- FORM -->
    <div class="p-6 w-full">

        <form action="../process/add-trip.php"
              method="POST"
              enctype="multipart/form-data"
              class="w-full space-y-6">

            <!-- GRID -->
            <div class="grid lg:grid-cols-2 gap-6">

                <div>
                    <label class="text-sm text-gray-600">Trip Title</label>
                    <input type="text" name="title" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Destination</label>
                    <input type="text" name="destination" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Price (per person)</label>
                    <input type="number" name="price" required
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Status</label>
                    <select name="status"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                        <option value="Active">Active</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Max Participants</label>
                    <input type="number" name="max_people"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Min Participants</label>
                    <input type="number" name="min_people"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-600">Description</label>
                <textarea name="description" rows="5" required
                    class="w-full mt-2 border px-4 py-3 rounded-lg"></textarea>
            </div>

            <!-- IMAGE UPLOAD (RESTRICTED) -->
            <div>
                <label class="text-sm text-gray-600">
                    Upload Images (Max 2 • 500KB each • Images only)
                </label>

                <input type="file"
                    name="images[]"
                    multiple
                    accept="image/jpeg,image/png,image/webp"
                    class="w-full mt-2 border px-4 py-3 rounded-lg"
                    onchange="validateImages(this)">

                <p class="text-xs text-gray-400 mt-2">
                    Only JPG, PNG, WEBP allowed. Max 2 images. Max 500KB each.
                </p>

                <!-- FRONTEND WARNING -->
                <p id="img-error" class="text-xs text-red-500 mt-2 hidden"></p>
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

<!-- SIMPLE FRONTEND VALIDATION -->
<script>
function validateImages(input) {
    const error = document.getElementById('img-error');
    error.classList.add('hidden');
    error.innerText = "";

    if (input.files.length > 2) {
        error.innerText = "You can only upload 2 images maximum.";
        error.classList.remove('hidden');
        input.value = "";
        return;
    }

    for (let i = 0; i < input.files.length; i++) {

        if (input.files[i].size > 500 * 1024) {
            error.innerText = "Each image must be less than 500KB.";
            error.classList.remove('hidden');
            input.value = "";
            return;
        }

        if (!['image/jpeg','image/png','image/webp'].includes(input.files[i].type)) {
            error.innerText = "Only JPG, PNG, WEBP images allowed.";
            error.classList.remove('hidden');
            input.value = "";
            return;
        }
    }
}
</script>

</body>
</html>