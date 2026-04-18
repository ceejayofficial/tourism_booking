<?php
session_start();

require __DIR__ . '/config/env.php';
loadEnv(__DIR__ . '/.env');

include 'includes/db.php';

// -------------------------
// GET & VALIDATE INPUT
// -------------------------
$name   = trim($_POST['name'] ?? '');
$email  = trim($_POST['email'] ?? '');
$people = (int)($_POST['people'] ?? 1);
$tripId = (int)($_POST['trip_id'] ?? 0);

if (!$name || !$email || !$tripId || $people < 1) {
    header("Location: trips.php");
    exit;
}
// -------------------------
// FETCH TRIP FROM DATABASE (TRUST SOURCE OF TRUTH)
// -------------------------
$stmt = $conn->prepare("SELECT id, title, price FROM trips WHERE id = ?");
$stmt->bind_param("i", $tripId);
$stmt->execute();
$trip = $stmt->get_result()->fetch_assoc();

if (!$trip) {
    die("Trip not found");
}

// -------------------------
// SERVER-SIDE CALCULATION (NO USER INPUT TRUSTED)
// -------------------------
$unitPrice = (float)$trip['price'];
$totalAmount = $unitPrice * $people;
$amountKobo = $totalAmount * 100;

// -------------------------
// UNIQUE PAYMENT REFERENCE
// -------------------------
$reference = 'TRIP_' . $tripId . '_' . time() . '_' . rand(1000, 9999);

// -------------------------
// STORE TEMP SESSION (FOR VERIFY PAGE)
// -------------------------
$_SESSION['payment'] = [
    'reference' => $reference,
    'trip_id'   => $tripId,
    'name'      => $name,
    'email'     => $email,
    'people'    => $people,
    'amount'    => $totalAmount
];
?>

<?php include 'components/cdn.php'; ?>

<!-- =========================
     PAYMENT UI
========================= -->
<section class="min-h-screen flex items-center justify-center bg-white px-6">

    <div class="w-full max-w-md">

     <div class="flex justify-center mb-6">

    <!-- SG PAY ICON ONLY (NO TEXT) -->
    <svg width="90" height="90" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">

        <!-- Outer circle (trust / payment network) -->
        <circle cx="50" cy="50" r="44" fill="#111"/>

        <!-- Inner shield (security) -->
        <path d="M50 20
                 L68 28
                 V46
                 C68 60 60 70 50 76
                 C40 70 32 60 32 46
                 V28
                 Z"
              fill="white"/>

        <!-- Check mark (payment success) -->
        <path d="M41 50 L48 57 L62 40"
              stroke="#111"
              stroke-width="5"
              stroke-linecap="round"
              stroke-linejoin="round"/>

    </svg>

</div>

        <p class="text-center text-gray-500 mb-8">
            <?= htmlspecialchars($trip['title']); ?>
        </p>

        <!-- SUMMARY CARD -->
        <div class="border rounded-xl p-6 space-y-4 bg-white">

            <div>
                <p class="text-sm text-gray-500">Name</p>
                <p class="text-black"><?= htmlspecialchars($name); ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="text-black"><?= htmlspecialchars($email); ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500">People</p>
                <p class="text-black"><?= $people; ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Total Amount</p>
                <p class="text-black font-semibold">
                    $<?= number_format($totalAmount, 2); ?>
                </p>
            </div>

        </div>

        <!-- PAY BUTTON -->
        <button onclick="payWithPaystack()"
            class="w-full mt-6 bg-black text-white py-3 rounded-full text-sm tracking-widest hover:bg-gray-800 transition">

            Pay Now

        </button>

        <p class="text-xs text-gray-400 text-center mt-4">
            Secure payment powered by Paystack
        </p>

    </div>

</section>

<!-- =========================
     PAYSTACK
========================= -->
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
function payWithPaystack() {

    let handler = PaystackPop.setup({

        key: "<?= getenv('PAYSTACK_PUBLIC_KEY'); ?>",
        email: "<?= $email; ?>",
        amount: <?= $amountKobo; ?>,
        currency: "GHS",

        ref: "<?= $reference; ?>",

        metadata: {
            custom_fields: [
                {
                    display_name: "Trip",
                    value: "<?= $trip['title']; ?>"
                },
                {
                    display_name: "People",
                    value: "<?= $people; ?>"
                }
            ]
        },

        callback: function(response) {
            window.location.href = "verify.php?reference=" + response.reference;
        },

        onClose: function() {
            alert("Payment window closed");
        }

    });

    handler.openIframe();
}
</script>

<?php include 'components/footer.php'; ?>