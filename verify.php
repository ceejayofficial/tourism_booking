<?php
session_start();

require __DIR__ . '/config/env.php';
loadEnv(__DIR__ . '/.env');

include 'includes/db.php';

$reference = $_GET['reference'] ?? '';

if (!$reference) {
    header("Location: trips.php");
    exit;
}

/* -------------------------
   VERIFY PAYMENT WITH PAYSTACK
-------------------------- */
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.paystack.co/transaction/verify/" . rawurlencode($reference));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . getenv('PAYSTACK_SECRET_KEY')
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (!$result || !$result['status']) {
    die("Payment verification failed");
}

$data = $result['data'];

if ($data['status'] !== "success") {
    die("Payment not successful");
}

/* -------------------------
   GET SESSION DATA
-------------------------- */
$payment = $_SESSION['payment'] ?? null;

if (!$payment) {
    die("Session expired");
}

$tripId = (int)$payment['trip_id'];
$amount = (float)$payment['amount'];
$email  = $payment['email'];
$name   = $payment['name'];

/* -------------------------
   SAVE BOOKING INTO DB
-------------------------- */

// OPTIONAL: check duplicate reference
$check = $conn->prepare("SELECT id FROM bookings WHERE reference = ?");
$check->bind_param("s", $reference);
$check->execute();
$exists = $check->get_result()->fetch_assoc();

if (!$exists) {

    $stmt = $conn->prepare("
        INSERT INTO bookings (user_id, trip_id, amount, status, reference, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");

    // if you don't have user system yet, use NULL or 0
    $userId = 0;
    $status = "Paid";

    $stmt->bind_param(
        "iisss",
        $userId,
        $tripId,
        $amount,
        $status,
        $reference
    );

    $stmt->execute();
}

/* -------------------------
   CLEAR SESSION
-------------------------- */
unset($_SESSION['payment']);
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

    <div class="text-center">

        <h1 class="text-2xl font-light text-black mb-4">
            Payment Successful 🎉
        </h1>

        <p class="text-gray-600 mb-6">
            Your booking has been confirmed.
        </p>

        <a href="trips.php"
           class="px-6 py-3 bg-black text-white rounded-full text-sm">
            Back to Trips
        </a>

    </div>

</body>
</html>