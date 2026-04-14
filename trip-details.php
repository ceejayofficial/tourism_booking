<?php
$trip = [
    "title" => "Arenal, Costa Rica",
    "price" => 1200,
    "duration" => "5 Days / 4 Nights",
    "dates" => "Jan - Nov",
    "image" => "assets/images/1.jpg",
    "description" => "Experience the breathtaking beauty of Arenal with volcano views, lush forests, waterfalls, and unforgettable adventures. Designed for travelers who want both relaxation and exploration in a premium setting."
];
?>

<?php include 'components/header.php'; ?>

<!-- HERO -->
<section class="relative h-[70vh] w-full">

    <img src="<?= $trip['image']; ?>"
         class="absolute inset-0 w-full h-full object-cover">

    <!-- LIGHT OVERLAY -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="relative z-10 h-full flex items-end px-6 lg:px-16 pb-12 text-white">

        <div>
            <p class="text-sm opacity-90"><?= $trip['dates']; ?></p>

            <h1 class="text-4xl md:text-6xl font-light mt-2">
                <?= $trip['title']; ?>
            </h1>

            <p class="mt-3 text-lg opacity-90">
                <?= $trip['duration']; ?>
            </p>
        </div>

    </div>

</section>

<!-- MAIN CONTENT -->
<section class="bg-white">

    <div class="max-w-6xl mx-auto px-6 py-20 grid lg:grid-cols-3 gap-12">

        <!-- LEFT -->
        <div class="lg:col-span-2">

            <h2 class="text-2xl font-light mb-6 text-black">
                About this trip
            </h2>

            <p class="text-gray-700 leading-relaxed text-[15px]">
                <?= $trip['description']; ?>
            </p>

            <!-- FEATURES -->
            <div class="grid grid-cols-2 gap-6 mt-12">

                <div class="p-6 border rounded-xl bg-white">
                    <h3 class="font-medium text-black">Destination</h3>
                    <p class="text-sm text-gray-600 mt-2"><?= $trip['title']; ?></p>
                </div>

                <div class="p-6 border rounded-xl bg-white">
                    <h3 class="font-medium text-black">Duration</h3>
                    <p class="text-sm text-gray-600 mt-2"><?= $trip['duration']; ?></p>
                </div>

                <div class="p-6 border rounded-xl bg-white">
                    <h3 class="font-medium text-black">Availability</h3>
                    <p class="text-sm text-gray-600 mt-2"><?= $trip['dates']; ?></p>
                </div>

                <div class="p-6 border rounded-xl bg-white">
                    <h3 class="font-medium text-black">Payment</h3>
                    <p class="text-sm text-gray-600 mt-2">Flexible plans available</p>
                </div>

            </div>

        </div>

        <!-- BOOKING -->
        <div class="bg-white border p-6 rounded-2xl sticky top-24 h-fit">

            <p class="text-sm text-gray-600">Price per person</p>

            <h3 class="text-3xl font-light mt-1 mb-6 text-black">
                $<?= $trip['price']; ?>
            </h3>

            <form action="pay.php" method="POST" class="space-y-4">

                <input type="hidden" name="trip" value="<?= $trip['title']; ?>">
                <input type="hidden" name="amount" value="<?= $trip['price']; ?>">

                <input type="text" name="name" placeholder="Full Name"
                    class="w-full border rounded-lg px-4 py-2 outline-none focus:border-black">

                <input type="email" name="email" placeholder="Email Address"
                    class="w-full border rounded-lg px-4 py-2 outline-none focus:border-black">

                <input type="number" name="people" placeholder="Number of People"
                    class="w-full border rounded-lg px-4 py-2 outline-none focus:border-black">

                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-full uppercase text-sm tracking-widest hover:opacity-90 transition">
                    Book Now
                </button>

            </form>

            <p class="text-xs text-gray-500 mt-4 text-center">
                Secure payment powered by Paystack
            </p>

        </div>

    </div>

</section>

<?php include 'components/footer.php'; ?>