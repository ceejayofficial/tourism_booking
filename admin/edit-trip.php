<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();
include __DIR__ . '/../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Trip ID");
}

$id = (int) $_GET['id'];

/* =========================
   FETCH TRIP
========================= */
$stmt = $conn->prepare("SELECT * FROM trips WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$trip = $stmt->get_result()->fetch_assoc();

if (!$trip) {
    die("Trip not found");
}

/* =========================
   FETCH IMAGES
========================= */
$imgStmt = $conn->prepare("SELECT image, image_type FROM trip_images WHERE trip_id=?");
$imgStmt->bind_param("i", $id);
$imgStmt->execute();
$images = $imgStmt->get_result();

$imageCount = $images->num_rows;
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

<div class="w-full min-h-screen">

    <!-- HEADER -->
    <div class="w-full border-b px-6 py-5 flex items-center justify-between">
        <h2 class="text-xl font-light">Edit Trip</h2>

        <a href="trips.php" class="text-sm text-gray-500 hover:text-black">
            ← Back to Trips
        </a>
    </div>

    <!-- FORM -->
    <div class="w-full px-6 py-10">

        <form action="../process/update-trip.php" method="POST" enctype="multipart/form-data"
              class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">

            <!-- LEFT -->
            <div class="space-y-6">

                <div>
                    <label class="text-sm text-gray-600">Trip Title</label>
                    <input type="text" name="title"
                        value="<?php echo htmlspecialchars($trip['title']); ?>"
                        class="w-full mt-2 border px-4 py-3 rounded-lg">
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

                        <option value="Active" <?php if($trip['status']=="Active") echo "selected"; ?>>Active</option>
                        <option value="Closed" <?php if($trip['status']=="Closed") echo "selected"; ?>>Closed</option>

                    </select>
                </div>

            </div>

            <!-- RIGHT -->
            <div class="space-y-6">

                <!-- DESCRIPTION -->
                <div>
                    <label class="text-sm text-gray-600">Description</label>
                    <textarea name="description" rows="8"
                        class="w-full mt-2 border px-4 py-3 rounded-lg"><?php echo htmlspecialchars($trip['description']); ?></textarea>
                </div>

                <!-- CURRENT IMAGES -->
                <div>
                    <label class="text-sm text-gray-600">Current Images (<?php echo $imageCount; ?>/2)</label>

                    <div class="grid grid-cols-3 gap-3 mt-3">

                        <?php if ($imageCount > 0): ?>
                            <?php foreach ($images as $img): ?>
                                <img 
                                    src="data:<?php echo $img['image_type']; ?>;base64,<?php echo base64_encode($img['image']); ?>"
                                    class="h-24 w-full object-cover rounded border"
                                >
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-xs text-gray-400">No images uploaded</p>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- UPLOAD CONTROL -->
                <div>
                    <label class="text-sm text-gray-600">
                        Add Images (Max 2 total, 500KB each)
                    </label>

                    <?php if ($imageCount >= 2): ?>

                        <div class="mt-2 p-3 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg">
                            This trip already has 2 images. Upload disabled.
                        </div>

                    <?php else: ?>

                        <input type="file"
                            name="images[]"
                            multiple
                            accept="image/*"
                            class="w-full mt-2 border px-4 py-3 rounded-lg">

                        <p class="text-xs text-gray-400 mt-2">
                            You can still upload <?php echo 2 - $imageCount; ?> image(s)
                        </p>

                    <?php endif; ?>

                </div>

            </div>

            <!-- BUTTON -->
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