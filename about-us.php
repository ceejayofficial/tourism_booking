<?php include 'components/header.php'; ?>

<!-- SPACER FOR FIXED HEADER -->
<div class="h-24"></div>

<!-- HERO -->
<section class="bg-white py-20 px-6">

    <div class="max-w-6xl mx-auto text-center">

        <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">
            About Curaters
        </p>

        <h1 class="text-4xl md:text-5xl font-light text-black">
            Crafting unforgettable travel experiences
        </h1>

        <p class="text-gray-600 mt-6 max-w-2xl mx-auto leading-relaxed">
            We are a premium travel brand dedicated to designing curated journeys that connect people with extraordinary destinations around the world.
        </p>

    </div>

</section>

<!-- ABOUT COMPONENT -->
<?php include 'components/about.php'; ?>

<!-- VISION & MISSION -->
<?php include 'components/vision.php'; ?>
<?php include 'components/who-are-we.php'; ?>

<!-- STATS -->
<section class="bg-white py-24 px-6">

    <div class="max-w-6xl mx-auto grid md:grid-cols-4 gap-10 text-center">

        <div>
            <p class="text-4xl font-light text-black">100+</p>
            <p class="text-gray-500 text-sm mt-2">Destinations</p>
        </div>

        <div>
            <p class="text-4xl font-light text-black">5K+</p>
            <p class="text-gray-500 text-sm mt-2">Happy Travelers</p>
        </div>

        <div>
            <p class="text-4xl font-light text-black">24/7</p>
            <p class="text-gray-500 text-sm mt-2">Support</p>
        </div>

        <div>
            <p class="text-4xl font-light text-black">100%</p>
            <p class="text-gray-500 text-sm mt-2">Custom Trips</p>
        </div>

    </div>

</section>

<!-- CTA -->
<section class="bg-white py-24 px-6 border-t">

    <div class="max-w-4xl mx-auto text-center">

        <h2 class="text-3xl font-light text-black">
            Ready to start your journey?
        </h2>

        <p class="text-gray-600 mt-4">
            Discover curated trips designed for unforgettable experiences.
        </p>

        <a href="trips.php"
           class="inline-block mt-8 bg-black text-white px-6 py-3 rounded-full text-xs uppercase tracking-widest hover:opacity-90 transition">
            Explore Trips
        </a>

    </div>

</section>

<?php include 'components/footer.php'; ?>