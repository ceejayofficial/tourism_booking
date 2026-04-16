<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<!-- ✅ CRITICAL FIX -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tourism Booking</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>

<body class="bg-black overflow-x-hidden">

<header class="absolute top-0 left-0 w-full z-50 text-white">

    <!-- NAVBAR -->
    <div class="flex items-center justify-between px-6 lg:px-10 py-6 bg-white/10 backdrop-blur-md">

        <!-- LEFT MENU -->
        <nav class="hidden lg:flex gap-6 text-xs uppercase tracking-widest font-light">
            <a href="./index.php" class="hover:opacity-70">Explore Packages</a>
            <a href="./trips.php" class="hover:opacity-70">Featured Destinations</a>
            <a href="#" class="hover:opacity-70">Escapes</a>
        </nav>

        <!-- LOGO -->
        <div class="text-lg sm:text-xl tracking-[0.3em] font-light uppercase">
            Curaters
        </div>

        <!-- RIGHT MENU -->
        <div class="hidden lg:flex items-center gap-6 text-xs uppercase tracking-widest font-light">

            <a href="trips.php" class="hover:opacity-70">Book a Trip</a>
            <a href="./about-us.php" class="hover:opacity-70">About Us</a>
            <a href="./contact.php" class="hover:opacity-70">Contact</a>

            <a href="./login.php" class="border border-white px-4 py-1 rounded-full hover:bg-white hover:text-black transition">
                Log in
            </a>
        </div>

        <!-- HAMBURGER -->
        <button id="menuBtn"
            class="lg:hidden w-11 h-11 flex items-center justify-center rounded-full border border-white/40 text-xl">
            ☰
        </button>

    </div>

    <!-- LINE -->
    <div class="w-full h-px bg-white/20"></div>

    <!-- ================= MOBILE MENU ================= -->
    <div id="mobileMenu"
         class="fixed top-0 left-0 h-full w-full bg-black/95 transform -translate-x-full transition-transform duration-300 ease-in-out z-50">

        <!-- TOP -->
        <div class="flex items-center justify-between px-6 py-6 border-b border-white/10">
            <div class="text-sm tracking-[0.3em] uppercase">Menu</div>
            <button id="closeBtn" class="text-2xl">✕</button>
        </div>

        <!-- LINKS -->
        <div class="flex flex-col gap-6 px-8 py-10 text-sm uppercase tracking-widest">

            <a href="./index.php">Explore Packages</a>
            <a href="./trips.php">Featured Destinations</a>
            <a href="#">Island Escapes</a>

            <div class="border-t border-white/10 pt-6 mt-6"></div>

            <a href="trips.php">Book a Trip</a>
            <a href="./about-us.php">About Us</a>
            <a href="./contact.php">Contact</a>

            <a href="./login.php"
               class="border border-white px-4 py-2 rounded-full w-fit mt-4">
                Log in
            </a>

        </div>
    </div>

</header>

<!-- ✅ FIXED SCRIPT -->
<script>
const menuBtn = document.getElementById("menuBtn");
const closeBtn = document.getElementById("closeBtn");
const mobileMenu = document.getElementById("mobileMenu");

menuBtn.addEventListener("click", () => {
    mobileMenu.classList.remove("-translate-x-full");
});

closeBtn.addEventListener("click", () => {
    mobileMenu.classList.add("-translate-x-full");
});
</script>

</body>
</html>