<?php include 'components/header.php'; ?>

<!-- HEADER SPACER -->
<div class="h-24"></div>

<!-- HERO -->
<section class="bg-white py-20 px-6">

    <div class="max-w-6xl mx-auto text-center">

        <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">
            Contact Us
        </p>

        <h1 class="text-4xl md:text-5xl font-light text-black">
            Let’s plan your next journey
        </h1>

        <p class="text-gray-600 mt-6 max-w-2xl mx-auto">
            Have questions or want a custom travel experience? Our team is ready to help you design unforgettable trips.
        </p>

    </div>

</section>

<!-- CONTACT SECTION -->
<section class="bg-white py-16 px-6">

    <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12">

        <!-- CONTACT INFO -->
        <div>

            <h2 class="text-2xl font-light text-black mb-6">
                Get in touch
            </h2>

            <p class="text-gray-600 mb-8 leading-relaxed">
                We respond within 24 hours. Reach out via email or send us a message using the form below.
            </p>

            <div class="space-y-6 text-gray-700">

                <!-- EMAIL -->
                <div class="flex items-start gap-4">

                    <div class="w-10 h-10 flex items-center justify-center border rounded-full">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15A2.25 2.25 0 012.25 17.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75m19.5 0l-9.75 6.75L2.25 6.75"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-black">info@curaters.com</p>
                    </div>

                </div>

                <!-- PHONE -->
                <div class="flex items-start gap-4">

                    <div class="w-10 h-10 flex items-center justify-center border rounded-full">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.336-.969-.832-1.112l-4.125-1.179a1.125 1.125 0 00-1.173.417l-.97 1.293a1.125 1.125 0 01-1.21.38 12.035 12.035 0 01-7.143-7.143 1.125 1.125 0 01.38-1.21l1.293-.97a1.125 1.125 0 00.417-1.173L6.084 3.332A1.125 1.125 0 004.97 2.5H3.75A2.25 2.25 0 001.5 4.75v2z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="text-black">+233 000 000 000</p>
                    </div>

                </div>

                <!-- LOCATION -->
                <div class="flex items-start gap-4">

                    <div class="w-10 h-10 flex items-center justify-center border rounded-full">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 11.25-7.5 11.25S4.5 18 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Location</p>
                        <p class="text-black">Accra, Ghana</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- FORM -->
        <div class="border rounded-3xl p-8 bg-white">

            <form action="send-mail.php" method="POST" class="space-y-5">

                <input type="text" name="name" placeholder="Full Name" required
                    class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

                <input type="email" name="email" placeholder="Email Address" required
                    class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

                <input type="text" name="subject" placeholder="Subject"
                    class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black">

                <textarea name="message" rows="5" placeholder="Message" required
                    class="w-full border rounded-lg px-4 py-3 outline-none focus:border-black"></textarea>

                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-full uppercase text-sm tracking-widest hover:opacity-90 transition">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>

<?php include 'components/footer.php'; ?>