<?php include 'components/cdn.php'; ?>

<?php
// SAMPLE DATA (replace with DB later)
$trips = [
    [
        "id" => 1,
        "title" => "Arenal, Costa Rica",
        "price" => 1200,
        "duration" => "5 Days",
        "image" => "assets/images/1.jpg",
        "category" => "Adventure"
    ],
    [
        "id" => 2,
        "title" => "Spain Cultural Escape",
        "price" => 1500,
        "duration" => "7 Days",
        "image" => "assets/images/2.jpg",
        "category" => "Culture"
    ],
    [
        "id" => 3,
        "title" => "Jamaica Island Retreat",
        "price" => 1100,
        "duration" => "6 Days",
        "image" => "assets/images/3.avif",
        "category" => "Island"
    ],
    [
        "id" => 4,
        "title" => "Maldives Luxury Escape",
        "price" => 2500,
        "duration" => "5 Days",
        "image" => "assets/images/4.jpg",
        "category" => "Luxury"
    ]
];
?>

<!-- 🌍 HERO HEADER -->
<section class="bg-white pt-32 pb-12 px-6">

    <div class="max-w-6xl mx-auto text-center">

        <h1 class="text-4xl md:text-5xl font-light text-black">
            Explore Our Trips
        </h1>

        <p class="text-gray-600 mt-4">
            Handpicked luxury travel experiences designed for unforgettable memories.
        </p>

    </div>

</section>

<!-- 🏷️ CATEGORIES -->
<section class="bg-white px-6 pb-10">

    <div class="max-w-6xl mx-auto flex flex-wrap justify-center gap-3">

        <button class="px-4 py-2 border rounded-full text-xs uppercase hover:bg-black hover:text-white transition">
            All
        </button>

        <button class="px-4 py-2 border rounded-full text-xs uppercase hover:bg-black hover:text-white transition">
            Adventure
        </button>

        <button class="px-4 py-2 border rounded-full text-xs uppercase hover:bg-black hover:text-white transition">
            Culture
        </button>

        <button class="px-4 py-2 border rounded-full text-xs uppercase hover:bg-black hover:text-white transition">
            Island
        </button>

        <button class="px-4 py-2 border rounded-full text-xs uppercase hover:bg-black hover:text-white transition">
            Luxury
        </button>

    </div>

</section>

<!-- ✈️ TRIPS GRID -->
<section class="bg-white px-6 pb-20">

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <?php foreach($trips as $trip): ?>

        <!-- CARD -->
        <a href="trip-details.php?id=<?= $trip['id']; ?>"
           class="group block rounded-3xl overflow-hidden border">

            <!-- IMAGE -->
            <div class="h-80 overflow-hidden">
                <img src="<?= $trip['image']; ?>"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            </div>

            <!-- CONTENT -->
            <div class="p-5">

                <p class="text-xs text-gray-500 uppercase">
                    <?= $trip['category']; ?>
                </p>

                <h3 class="text-lg font-light text-black mt-1">
                    <?= $trip['title']; ?>
                </h3>

                <div class="flex justify-between items-center mt-4">

                    <p class="text-sm text-gray-600">
                        <?= $trip['duration']; ?>
                    </p>

                    <p class="text-black font-medium">
                        $<?= $trip['price']; ?>
                    </p>

                </div>

            </div>

        </a>

        <?php endforeach; ?>

    </div>

</section>

<?php include 'components/footer.php'; ?>