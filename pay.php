<?php
// GET FORM DATA
$name   = $_POST['name'] ?? '';
$email  = $_POST['email'] ?? '';
$amount = $_POST['amount'] ?? 0;
$trip   = $_POST['trip'] ?? '';

// Convert to kobo (Paystack uses kobo)
$amount_kobo = $amount * 100;
?>

<?php include 'components/header.php'; ?>

<!-- PAYMENT SECTION -->
<section class="bg-white min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-md text-center">

        <!-- TITLE -->
        <h2 class="text-3xl font-light text-black mb-4">
            Complete Your Booking
        </h2>

        <p class="text-gray-600 mb-8">
            You are booking: <strong><?= $trip; ?></strong>
        </p>

        <!-- SUMMARY -->
        <div class="border rounded-xl p-6 mb-6 text-left">

            <p class="text-sm text-gray-600">Name</p>
            <p class="mb-3 text-black"><?= $name; ?></p>

            <p class="text-sm text-gray-600">Email</p>
            <p class="mb-3 text-black"><?= $email; ?></p>

            <p class="text-sm text-gray-600">Amount</p>
            <p class="text-black font-medium">$<?= $amount; ?></p>

        </div>

        <!-- PAY BUTTON -->
        <button onclick="payWithPaystack()"
            class="w-full bg-black text-white py-3 rounded-full uppercase text-sm tracking-widest hover:opacity-90 transition">
            Pay Now
        </button>

        <p class="text-xs text-gray-500 mt-4">
            Secure payment powered by Paystack
        </p>

    </div>

</section>

<!-- PAYSTACK SCRIPT -->
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
function payWithPaystack() {

    let handler = PaystackPop.setup({
        key: "YOUR_PUBLIC_KEY_HERE", // 🔑 replace with your Paystack public key
        email: "<?= $email; ?>",
        amount: <?= $amount_kobo; ?>,
        currency: "GHS",

        metadata: {
            custom_fields: [
                {
                    display_name: "Customer Name",
                    variable_name: "customer_name",
                    value: "<?= $name; ?>"
                },
                {
                    display_name: "Trip",
                    variable_name: "trip",
                    value: "<?= $trip; ?>"
                }
            ]
        },

        callback: function(response) {
            // SUCCESS
            window.location.href = "success.php?reference=" + response.reference;
        },

        onClose: function() {
            alert("Payment window closed.");
        }
    });

    handler.openIframe();
}
</script>

<?php include 'components/footer.php'; ?>