<?php include 'components/cdn.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
// -------------------------
// PAGINATION SETTINGS
// -------------------------
$limit = 9; // trips per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);

$offset = ($page - 1) * $limit;

// -------------------------
// TOTAL TRIPS
// -------------------------
$totalResult = $conn->query("SELECT COUNT(*) as total FROM trips");
$totalTrips = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalTrips / $limit);

// -------------------------
// FETCH TRIPS (PAGINATED)
// -------------------------
$stmt = $conn->prepare("
    SELECT 
        trips.*,
        trip_images.image,
        trip_images.image_type
    FROM trips
    LEFT JOIN trip_images 
        ON trip_images.id = (
            SELECT id 
            FROM trip_images 
            WHERE trip_id = trips.id 
            LIMIT 1
        )
    ORDER BY trips.id DESC
    LIMIT ? OFFSET ?
");

$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- HERO -->
<section class="bg-white pt-32 pb-12">
    <div class="max-w-6xl mx-auto text-center">

        <h1 class="text-4xl md:text-5xl font-light text-black">
            Explore Our Trips
        </h1>

        <p class="text-gray-600 mt-4">
            Handpicked luxury travel experiences designed for unforgettable memories.
        </p>

    </div>
</section>

<!-- GRID -->
<section class="bg-white px-6 pb-10">

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <?php while($trip = $result->fetch_assoc()): ?>

        <div class="rounded-3xl overflow-hidden border bg-white flex flex-col h-[520px]">

            <!-- IMAGE -->
            <div class="h-72 overflow-hidden bg-gray-100">

                <?php if (!empty($trip['image'])): ?>
                    <img src="data:<?= $trip['image_type']; ?>;base64,<?= base64_encode($trip['image']); ?>"
                         class="w-full h-full object-cover hover:scale-110 transition duration-700">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                        No Image
                    </div>
                <?php endif; ?>

            </div>

            <!-- CONTENT -->
            <div class="p-5 flex flex-col flex-1">

                <p class="text-xs text-gray-500 uppercase">
                    <?= htmlspecialchars($trip['destination']); ?>
                </p>

                <h3 class="text-lg font-light text-black mt-1">
                    <?= htmlspecialchars($trip['title']); ?>
                </h3>

                <div class="mt-3 h-[72px] overflow-hidden">
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <?= htmlspecialchars($trip['description']); ?>
                    </p>
                </div>

                <div class="flex justify-between items-center mt-4">

                    <p class="text-sm text-gray-600">
                        <?= $trip['max_people'] ? $trip['max_people'] . ' Slots' : '—'; ?>
                    </p>

                    <p class="text-black font-medium">
                        $<?= number_format($trip['price'], 2); ?>
                    </p>

                </div>

                <div class="mt-auto pt-5">

                    <a href="trip-details.php?id=<?= $trip['id']; ?>"
                       class="block text-center border border-black text-black py-2 rounded-full text-xs uppercase tracking-widest hover:bg-black hover:text-white transition">
                        View Details
                    </a>

                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</section>

<!-- PAGINATION -->
<?php include 'components/pagination.php'; ?>

<?php include 'components/footer.php'; ?>