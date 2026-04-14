<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>

</head>

<body class="bg-white">

<!-- CENTER WRAPPER -->
<section class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-md">

        <!-- TITLE -->
        <div class="text-center mb-10">

            <h1 class="text-3xl font-light text-black">
                Welcome Back
            </h1>

            <p class="text-gray-600 mt-2 text-sm">
                Login to continue your journey with Curaters
            </p>

        </div>

        <!-- FORM -->
        <form action="./process/login-process.php" method="POST" class="space-y-5">

            <input type="email" name="email" placeholder="Email Address" required
                class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

            <input type="password" name="password" placeholder="Password" required
                class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

            <button type="submit"
                class="w-full bg-black text-white py-3 rounded-full uppercase text-sm tracking-widest hover:opacity-90 transition">
                Login
            </button>

        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Don't have an account?
            <a href="signup.php" class="text-black underline">Sign up</a>
        </p>

    </div>

</section>

</body>
</html>