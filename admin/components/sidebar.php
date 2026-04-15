<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<!-- SIDEBAR -->
<aside class="w-64 border-r hidden md:flex flex-col justify-between min-h-screen bg-white">

    <div>

        <!-- LOGO -->
        <div class="p-6 border-b">
            <h1 class="text-lg tracking-widest uppercase font-light">
                Curaters Admin
            </h1>
        </div>

        <!-- MENU -->
        <nav class="p-6 space-y-4 text-sm">

            <a href="index.php"
               class="<?php echo $current == 'index.php' ? 'text-black font-medium' : 'text-gray-600'; ?> hover:text-black block">
                Dashboard
            </a>

            <a href="trips.php"
               class="<?php echo $current == 'trips.php' ? 'text-black font-medium' : 'text-gray-600'; ?> hover:text-black block">
                Trips
            </a>

            <a href="bookings.php"
               class="<?php echo $current == 'bookings.php' ? 'text-black font-medium' : 'text-gray-600'; ?> hover:text-black block">
                Bookings
            </a>

            <a href="media.php"
               class="<?php echo $current == 'media.php' ? 'text-black font-medium' : 'text-gray-600'; ?> hover:text-black block">
                Media
            </a>

            <a href="content.php"
               class="<?php echo $current == 'content.php' ? 'text-black font-medium' : 'text-gray-600'; ?> hover:text-black block">
                Content
            </a>

        </nav>

    </div>

    <!-- LOGOUT (WITH CONFIRMATION) -->
    <div class="p-6 border-t">

        <button onclick="openLogoutModal()"
                class="text-sm text-gray-500 hover:text-black">
            Logout
        </button>

    </div>

</aside>

<!-- ================= LOGOUT MODAL ================= -->
<div id="logoutModal"
     class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-80 text-center space-y-4">

        <h2 class="text-lg font-light">Confirm Logout</h2>
        <p class="text-sm text-gray-500">
            Are you sure you want to logout?
        </p>

        <div class="flex justify-center gap-4 pt-2">

            <button onclick="closeLogoutModal()"
                    class="px-4 py-2 border rounded-full text-sm">
                Cancel
            </button>

            <a href="./logout.php"
               class="px-4 py-2 bg-black text-white rounded-full text-sm">
                Yes, Logout
            </a>

        </div>

    </div>

</div>

<!-- ================= SCRIPT ================= -->
<script>
function openLogoutModal() {
    document.getElementById('logoutModal').classList.remove('hidden');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.add('hidden');
}
</script>