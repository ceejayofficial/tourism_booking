<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();
include __DIR__ . '/../includes/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM trips WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$trip = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Trip | Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<!-- FULL WIDTH WRAPPER -->
<div class="w-full min-h-screen">

    <!-- HEADER -->
    <div class="w-full border-b px-6 py-5 flex items-center justify-between">

        <h2 class="text-xl font-light">Edit Trip</h2>

        <a href="trips.php" class="text-sm text-gray-500 hover:text-black">
            ← Back to Trips
        </a>

    </div>

    <!-- FORM CONTAINER -->
    <div class="w-full px-6 py-10">

        <form action="../process/update-trip.php" method="POST" enctype="multipart/form-data"
              class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8">

            <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">

            <!-- LEFT SIDE -->
            <div class="space-y-6">

                <div>
                    <label class="text-sm text-gray-600">Trip Title</label>
                    <input type="text" name="title"
                        value="<?php echo htmlspecialchars($trip['title']); ?>"
                        class="w-full mt-2 border px-4 py-3 rounded-lg focus:outline-none focus:border-black">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Destination</label>
                    <input type="text" name="destination"
                        value="<?php echo htmlspecialchars($trip['destination']); ?>"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Price</label>
                    <input type="number" name="price"
                        value="<?php echo $trip['price']; ?>"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Status</label>
                    <select name="status"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">

                        <option value="Active" <?php if($trip['status']=="Active") echo "selected"; ?>>
                            Active
                        </option>

                        <option value="Closed" <?php if($trip['status']=="Closed") echo "selected"; ?>>
                            Closed
                        </option>

                    </select>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="space-y-6">

                <div>
                    <label class="text-sm text-gray-600">Description</label>
                    <textarea name="description" rows="10"
                        class="w-full mt-2 border px-4 py-3 rounded-lg"><?php echo htmlspecialchars($trip['description']); ?></textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-600">
                        Add New Images (Max 2)
                    </label>

                    <input type="file" name="images[]" multiple accept="image/*"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">

                    <p class="text-xs text-gray-400 mt-2">
                        You can upload up to 2 new images
                    </p>
                </div>

            </div>

            <!-- FULL WIDTH BUTTON -->
            <div class="lg:col-span-2">

                <button type="submit"
                    class="bg-black text-white px-8 py-3 rounded-full text-sm uppercase tracking-widest hover:opacity-90">
                    Update Trip
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>