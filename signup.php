<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up | Curaters</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>

</head>

<body class="bg-white">

<section class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-md">

        <!-- TITLE -->
        <div class="text-center mb-10">

            <h1 class="text-3xl font-light text-black">
                Create Account
            </h1>

            <p class="text-gray-600 mt-2 text-sm">
                Join Curaters and start booking trips
            </p>

        </div>

        <!-- FORM -->
        <form action="process/signup-process.php" method="POST" class="space-y-5">

            <input type="text" name="name" placeholder="Full Name" required
                class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

            <input type="email" name="email" placeholder="Email Address" required
                class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

            <!-- PASSWORD -->
            <input type="password" id="password" name="password" placeholder="Password"
                oninput="checkStrength(this.value)" required
                class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

            <!-- STRENGTH BAR -->
            <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                <div id="bar" class="h-full w-0 bg-red-500 transition-all"></div>
            </div>

            <p id="text" class="text-xs text-gray-500"></p>

            <button type="submit"
                class="w-full bg-black text-white py-3 rounded-full uppercase text-sm tracking-widest hover:opacity-90 transition">
                Create Account
            </button>

        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="login.php" class="text-black underline">Login</a>
        </p>

    </div>

</section>

<!-- PASSWORD STRENGTH -->
<script>
function checkStrength(p) {

    let bar = document.getElementById("bar");
    let text = document.getElementById("text");

    let s = 0;

    if (p.length >= 6) s++;
    if (p.length >= 10) s++;
    if (/[A-Z]/.test(p)) s++;
    if (/[0-9]/.test(p)) s++;
    if (/[@$!%*?&#]/.test(p)) s++;

    bar.style.width = (s * 20) + "%";

    if (s <= 2) {
        bar.className = "h-full bg-red-500 transition-all";
        text.innerText = "Weak password";
    } 
    else if (s <= 4) {
        bar.className = "h-full bg-yellow-500 transition-all";
        text.innerText = "Medium password";
    } 
    else {
        bar.className = "h-full bg-green-500 transition-all";
        text.innerText = "Strong password";
    }
}
</script>

</body>
</html>