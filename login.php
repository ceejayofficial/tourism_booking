<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: admin/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>

</head>

<body class="bg-gray-50">

<!-- FULL SCREEN CENTER WRAPPER -->
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">

    <!-- CARD -->
    <div class="w-full max-w-sm sm:max-w-md bg-white rounded-2xl shadow-sm border p-6 sm:p-10">

        <!-- HEADER -->
        <div class="text-center mb-8 sm:mb-10">

            <h1 class="text-2xl sm:text-3xl font-light text-black">
                Welcome Back
            </h1>

            <p class="text-gray-500 mt-2 text-sm">
                Login to continue your journey with Curaters
            </p>

        </div>

        <!-- FORM -->
        <form action="process/login-process.php" method="POST" class="space-y-4 sm:space-y-5">

            <!-- EMAIL -->
            <div>
                <input type="email" name="email" placeholder="Email Address" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm sm:text-base
                           focus:outline-none focus:border-black transition">
            </div>

            <!-- PASSWORD -->
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm sm:text-base
                           focus:outline-none focus:border-black transition">
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-black text-white py-3 rounded-full text-sm uppercase tracking-widest
                       hover:opacity-90 active:scale-[0.99] transition">
                Login
            </button>

        </form>

        <!-- FOOTER -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Don't have an account?
            <a href="signup.php" class="text-black font-medium hover:underline">
                Sign up
            </a>
        </p>

    </div>

</div>

</body>
</html>