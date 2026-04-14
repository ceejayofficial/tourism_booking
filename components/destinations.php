<section class="bg-[#f9fafb] py-20 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-12">

            <div>
                <p class="text-xs uppercase tracking-widest text-red-400 mb-2">
                    Suggested Private Destinations
                </p>

                <h2 class="text-3xl md:text-4xl font-light text-gray-800 leading-snug">
                    Bucket list vacations designed for your budget!
                </h2>

                <p class="text-sm text-gray-500 mt-3 max-w-md">
                    Browse our travel packages or request a customized trip designed to match your travel style.
                </p>
            </div>

            <!-- TAG BUTTONS -->
            <div class="flex flex-wrap gap-3">

                <span class="border border-red-300 text-red-400 px-4 py-1 rounded-full text-xs uppercase">
                    Over 100 Destinations
                </span>

                <span class="border border-red-300 text-red-400 px-4 py-1 rounded-full text-xs uppercase">
                    For Every Budget
                </span>

                <span class="border border-red-300 text-red-400 px-4 py-1 rounded-full text-xs uppercase">
                    Flexible Payments
                </span>

                <span class="border border-red-300 text-red-400 px-4 py-1 rounded-full text-xs uppercase">
                    Curated Travel Plans
                </span>

            </div>

        </div>

        <!-- DESTINATION CARDS -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- CARD 1 -->
            <a href="trip-details.php?id=1"
               class="group relative block h-[420px] rounded-3xl overflow-hidden">

                <img src="assets/images/1.jpg"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                <!-- OVERLAY -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- TAGS -->
                <div class="absolute top-4 left-4 flex gap-2 text-[10px]">
                    <span class="bg-white/80 px-2 py-1 rounded">Adventure</span>
                    <span class="bg-white/80 px-2 py-1 rounded">Luxury</span>
                </div>

                <!-- TEXT -->
                <div class="absolute bottom-6 left-6 text-white">
                    <p class="text-xs opacity-80">Jan - Nov</p>
                    <h3 class="text-xl font-medium">Arenal, Costa Rica</h3>
                </div>

            </a>

            <!-- CARD 2 -->
            <a href="trip-details.php?id=2"
               class="group relative block h-[420px] rounded-3xl overflow-hidden">

                <img src="assets/images/2.jpg"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <div class="absolute top-4 left-4 flex gap-2 text-[10px]">
                    <span class="bg-white/80 px-2 py-1 rounded">City</span>
                    <span class="bg-white/80 px-2 py-1 rounded">Culture</span>
                </div>

                <div class="absolute bottom-6 left-6 text-white">
                    <p class="text-xs opacity-80">All Year</p>
                    <h3 class="text-xl font-medium">Spain</h3>
                </div>

            </a>

            <!-- CARD 3 -->
            <a href="trip-details.php?id=3"
               class="group relative block h-[420px] rounded-3xl overflow-hidden">

                <img src="assets/images/3.avif"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <div class="absolute top-4 left-4 flex gap-2 text-[10px]">
                    <span class="bg-white/80 px-2 py-1 rounded">Adventure</span>
                    <span class="bg-white/80 px-2 py-1 rounded">Island</span>
                </div>

                <div class="absolute bottom-6 left-6 text-white">
                    <p class="text-xs opacity-80">Seasonal</p>
                    <h3 class="text-xl font-medium">Jamaica Getaway</h3>
                </div>

            </a>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-center mt-12">
            <a href="trips.php"
               class="bg-black text-white px-6 py-3 rounded-full text-xs uppercase tracking-widest hover:bg-gray-800 transition">
                Discover All Destinations
            </a>
        </div>

    </div>

</section>