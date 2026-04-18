<?php
include 'includes/db.php';
include 'components/cdn.php';

// GET TRIP ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// FETCH TRIP
$stmt = $conn->prepare("SELECT * FROM trips WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$trip = $stmt->get_result()->fetch_assoc();

// ❌ BLOCK INVALID OR CLOSED TRIPS
if (!$trip) {
    header("Location: trips.php");
    exit;
}

if ($trip['status'] !== 'Active') {
    header("Location: trips.php");
    exit;
}

// FETCH ALL IMAGES
$imgStmt = $conn->prepare("SELECT image, image_type FROM trip_images WHERE trip_id = ?");
$imgStmt->bind_param("i", $id);
$imgStmt->execute();
$imgResult = $imgStmt->get_result();

$images = [];
while ($img = $imgResult->fetch_assoc()) {
    $images[] = "data:" . $img['image_type'] . ";base64," . base64_encode($img['image']);
}

// fallback image
if (empty($images)) {
    $images[] = "assets/images/placeholder.jpg";
}

$heroImage = $images[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($trip['title']); ?></title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
    background: #ffffff;
    font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
}

/* simple image zoom modal */
#imgModal {
    display: none;
}
</style>
</head>

<body class="bg-white">

<?php include 'components/header.php'; ?>

<!-- HERO -->
<section class="relative h-[70vh] w-full bg-white">

    <img src="<?= $heroImage; ?>"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 h-full flex items-end px-6 lg:px-16 pb-12 text-white">

        <div>
            <p class="text-sm opacity-80">
                <?= htmlspecialchars($trip['status']); ?>
            </p>

            <h1 class="text-4xl md:text-6xl font-light mt-2">
                <?= htmlspecialchars($trip['title']); ?>
            </h1>

            <p class="mt-3 text-lg opacity-90">
                <?= htmlspecialchars($trip['destination']); ?>
            </p>
        </div>

    </div>
</section>

<!-- DETAILS -->
<section class="max-w-6xl mx-auto px-6 py-16 grid lg:grid-cols-3 gap-12 bg-white">

    <!-- LEFT -->
    <div class="lg:col-span-2">

        <h2 class="text-2xl font-light mb-6 text-black">About this trip</h2>

        <p class="text-gray-600 leading-relaxed">
            <?= nl2br(htmlspecialchars($trip['description'])); ?>
        </p>

        <!-- FEATURES -->
        <div class="grid grid-cols-2 gap-6 mt-10">

            <div class="p-6 border rounded-xl bg-white">
                <h3 class="text-sm text-gray-500">Destination</h3>
                <p class="mt-2 text-black font-medium">
                    <?= htmlspecialchars($trip['destination']); ?>
                </p>
            </div>

            <div class="p-6 border rounded-xl bg-white">
                <h3 class="text-sm text-gray-500">Capacity</h3>
                <p class="mt-2 text-black font-medium">
                    <?= htmlspecialchars($trip['max_people']); ?> People
                </p>
            </div>

            <div class="p-6 border rounded-xl bg-white">
                <h3 class="text-sm text-gray-500">Minimum People</h3>
                <p class="mt-2 text-black font-medium">
                    <?= htmlspecialchars($trip['min_people']); ?> Required
                </p>
            </div>

            <div class="p-6 border rounded-xl bg-white">
                <h3 class="text-sm text-gray-500">Payment</h3>
                <p class="mt-2 text-black font-medium">
                    Flexible plans available
                </p>
            </div>

        </div>

        <!-- GALLERY -->
        <div class="mt-10">

            <h3 class="text-lg font-light mb-4">Trip Gallery</h3>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                <?php foreach ($images as $img): ?>
                    <img src="<?= $img; ?>"
                         onclick="openImage(this.src)"
                         class="w-full h-28 object-cover rounded-lg cursor-pointer hover:scale-105 transition duration-300 border">
                <?php endforeach; ?>

            </div>
        </div>

    </div>

    <!-- RIGHT CARD -->
    <div class="bg-white p-6 rounded-2xl border shadow-sm sticky top-24 h-fit">

        <p class="text-sm text-gray-500">Price per person</p>

        <h3 class="text-3xl font-light mt-1 mb-6 text-black">
            $<?= number_format($trip['price'], 2); ?>
        </h3>

        <form action="pay.php" method="POST" class="space-y-4">

            <input type="hidden" name="trip_id" value="<?= $trip['id']; ?>">
            <input type="hidden" name="amount" value="<?= $trip['price']; ?>">

            <input type="text" name="name" placeholder="Full Name"
                   class="w-full border rounded-lg px-4 py-2 outline-none">

            <input type="email" name="email" placeholder="Email Address"
                   class="w-full border rounded-lg px-4 py-2 outline-none">

            <input type="number" name="people" placeholder="Number of People"
                   class="w-full border rounded-lg px-4 py-2 outline-none">

            <button type="submit"
                class="w-full bg-black text-white py-3 rounded-full text-sm tracking-widest hover:bg-gray-800 transition">
                Book Now
            </button>

        </form>

        <p class="text-xs text-gray-400 mt-4 text-center">
            Secure payment via Paystack
        </p>

    </div>

</section>

<!-- IMAGE MODAL -->
<div id="imgModal" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50">
    <img id="modalImg" class="max-w-4xl max-h-[90vh] rounded-lg">
</div>

<script>
function openImage(src) {
    document.getElementById('imgModal').style.display = 'flex';
    document.getElementById('modalImg').src = src;
}

document.getElementById('imgModal').onclick = function () {
    this.style.display = 'none';
};
</script>

<?php include 'components/footer.php'; ?>

</body>
</html>