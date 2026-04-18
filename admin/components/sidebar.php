<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 antialiased overflow-x-hidden">

<!-- ================= TOP BAR ================= -->
<header class="fixed top-0 left-0 right-0 h-14 bg-white border-b z-50 flex items-center justify-between px-4 md:pl-64">

    <button onclick="toggleSidebar()" class="md:hidden p-2 border rounded-md shadow-sm">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <h1 class="text-sm uppercase tracking-widest font-light">
        Curaters Admin
    </h1>

    <div></div>
</header>

<!-- ================= OVERLAY ================= -->
<div id="overlay"
     onclick="toggleSidebar()"
     class="hidden fixed inset-0 bg-black/50 z-40 md:hidden"></div>

<!-- ================= SIDEBAR ================= -->
<aside id="sidebar"
       class="fixed top-0 left-0 h-full w-64 bg-white border-r z-50
              transform -translate-x-full md:translate-x-0
              transition-transform duration-300 flex flex-col">

    <!-- LOGO -->
    <div class="h-14 flex items-center px-6 border-b">
        <h1 class="text-lg uppercase tracking-widest font-light">
            Curaters
        </h1>
    </div>

    <!-- MENU -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-2 text-sm">

        <!-- DASHBOARD -->
        <a href="index.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'index.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l9-9 9 9v9a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3z"/>
            </svg>

            Dashboard
        </a>

        <!-- TRIPS -->
        <a href="trips.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'trips.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 20l-5-2V6l5 2m0 12l6-2m-6 2V8m6 10l5-2V4l-5 2m0 12V6"/>
            </svg>

            Trips
        </a>

        <!-- BOOKINGS -->
        <a href="bookings.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'bookings.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3M4 11h16M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>

            Bookings
        </a>

        <!-- MEDIA -->
        <a href="media.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'media.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 10l4 2V8l-4 2m-6 4l-4 2V8l4 2m6 4V6a2 2 0 00-2-2H9a2 2 0 00-2 2v8"/>
            </svg>

            Media
        </a>

        <!-- CONTENT -->
        <a href="content.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'content.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
            </svg>

            Content
        </a>

        <!-- USERS -->
        <a href="users.php"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
           <?php echo $current == 'users.php' ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100'; ?>">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-9a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>

            Users
        </a>

    </nav>

    <!-- LOGOUT -->
    <div class="p-4 border-t">
        <button onclick="openLogoutModal()" class="flex items-center gap-2 text-sm text-gray-500 hover:text-black">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7"/>
            </svg>
            Logout
        </button>
    </div>

</aside>

<!-- ================= MAIN ================= -->
<main class="pt-14 md:pl-64 p-4">
</main>

<!-- ================= LOGOUT MODAL ================= -->
<div id="logoutModal"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-[100]">

    <div class="bg-white rounded-xl p-6 w-80 text-center space-y-4">

        <h2 class="text-lg font-light">Confirm Logout</h2>
        <p class="text-sm text-gray-500">Are you sure you want to logout?</p>

        <div class="flex justify-center gap-4 pt-2">

            <button onclick="closeLogoutModal()" class="px-4 py-2 border rounded-full text-sm">
                Cancel
            </button>

            <a href="./logout.php" class="px-4 py-2 bg-black text-white rounded-full text-sm">
                Yes, Logout
            </a>

        </div>

    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    const hidden = sidebar.classList.contains('-translate-x-full');

    if (hidden) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    } else {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}

function openLogoutModal() {
    document.getElementById('logoutModal').classList.remove('hidden');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.add('hidden');
}
</script>

</body>
</html>