<?php include 'components/cdn.php'; ?>

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

<!-- CONTACT -->
<section class="bg-white py-16 px-6">

    <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12">

        <!-- LEFT -->
        <div>
            <h2 class="text-2xl font-light text-black mb-6">Get in touch</h2>

            <p class="text-gray-600 mb-8">
                We respond within 24 hours. Reach out via email or send us a message.
            </p>
        </div>

        <!-- FORM -->
        <div class="border rounded-3xl p-8 bg-white">

            <form id="contactForm" class="space-y-5">

                <input type="text" name="name" placeholder="Full Name" required
                    class="w-full border rounded-lg px-4 py-3">

                <input type="email" name="email" placeholder="Email Address" required
                    class="w-full border rounded-lg px-4 py-3">

                <input type="text" name="subject" placeholder="Subject"
                    class="w-full border rounded-lg px-4 py-3">

                <textarea name="message" rows="5" placeholder="Message" required
                    class="w-full border rounded-lg px-4 py-3"></textarea>

                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-full uppercase text-sm">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>

<?php include 'components/footer.php'; ?>

<!-- SWEETALERT CDN (REQUIRED) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- AJAX + SWAL -->
<script>
document.getElementById("contactForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    Swal.fire({
        title: "Sending...",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    try {
        const res = await fetch("send-mail.php", {
            method: "POST",
            body: formData
        });

        const text = await res.text();

        if (text.trim() === "success") {
            Swal.fire({
                icon: "success",
                title: "Message Sent",
                text: "We will contact you soon.",
                confirmButtonColor: "#000"
            });

            form.reset();

        } else {
            Swal.fire({
                icon: "error",
                title: "Failed",
                text: "Something went wrong.",
                confirmButtonColor: "#000"
            });
        }

    } catch (err) {
        Swal.fire({
            icon: "error",
            title: "Network Error",
            text: "Check your connection.",
            confirmButtonColor: "#000"
        });
    }
});
</script>