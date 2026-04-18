<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sign Up | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>

</head>

<body class="bg-gray-50">

<!-- CENTER WRAPPER -->
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">

    <!-- CARD -->
    <div class="w-full max-w-sm sm:max-w-md bg-white border rounded-2xl shadow-sm p-6 sm:p-10">

        <!-- TITLE -->
        <div class="text-center mb-8 sm:mb-10">

            <h1 class="text-2xl sm:text-3xl font-light text-black">
                Create Account
            </h1>

            <p class="text-gray-500 mt-2 text-sm">
                Join Curaters and start booking trips
            </p>

        </div>

        <!-- FORM -->
        <form action="process/signup-process.php" method="POST" class="space-y-4 sm:space-y-5">

            <!-- NAME -->
            <input type="text" name="name" placeholder="Full Name" required
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm sm:text-base
                       focus:outline-none focus:border-black transition">

            <!-- EMAIL -->
            <input type="email" name="email" placeholder="Email Address" required
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm sm:text-base
                       focus:outline-none focus:border-black transition">

            <!-- PASSWORD -->
            <input type="password" id="password" name="password" placeholder="Password"
                oninput="checkStrength(this.value)" required
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm sm:text-base
                       focus:outline-none focus:border-black transition">

            <!-- STRENGTH BAR -->
            <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                <div id="bar" class="h-full w-0 bg-red-500 transition-all duration-300"></div>
            </div>

            <p id="text" class="text-xs text-gray-500"></p>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-black text-white py-3 rounded-full text-sm uppercase tracking-widest
                       hover:opacity-90 active:scale-[0.99] transition">
                Create Account
            </button>

        </form>

        <!-- FOOTER -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account?
            <a href="login.php" class="text-black font-medium hover:underline">
                Login
            </a>
        </p>

    </div>

</div>

<!-- PASSWORD STRENGTH SCRIPT -->
<script>
function checkStrength(p) {

    const bar = document.getElementById("bar");
    const text = document.getElementById("text");

    let s = 0;

    if (p.length >= 6) s++;
    if (p.length >= 10) s++;
    if (/[A-Z]/.test(p)) s++;
    if (/[0-9]/.test(p)) s++;
    if (/[@$!%*?&#]/.test(p)) s++;

    bar.style.width = (s * 20) + "%";

    if (s <= 2) {
        bar.className = "h-full bg-red-500 transition-all duration-300";
        text.innerText = "Weak password";
    } 
    else if (s <= 4) {
        bar.className = "h-full bg-yellow-500 transition-all duration-300";
        text.innerText = "Medium password";
    } 
    else {
        bar.className = "h-full bg-green-500 transition-all duration-300";
        text.innerText = "Strong password";
    }
}
</script>

</body>
</html>