<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();

include __DIR__ . '/../includes/db.php';

// FETCH BOOKINGS
$sql = "
SELECT 
    b.id,
    b.amount,
    b.status,
    b.reference,
    b.created_at,
    u.name AS user_name,
    u.email AS user_email,
    t.title AS trip_title
FROM bookings b
LEFT JOIN users u ON b.user_id = u.id
LEFT JOIN trips t ON b.trip_id = t.id
ORDER BY b.id DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bookings | Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<div class="flex min-h-screen">

<?php include 'components/sidebar.php'; ?>
    <!-- MAIN -->
    <main class="flex-1">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between px-6 py-5 border-b">

            <h2 class="text-xl font-light">Bookings</h2>

            <div class="text-sm text-gray-500">
                All Customer Reservations
            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-6">

            <div class="overflow-x-auto border rounded-xl">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600 text-left">
                        <tr>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Trip</th>
                            <th class="p-4">Amount</th>
                            <th class="p-4">Reference</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php while($row = $result->fetch_assoc()): ?>

                        <tr class="border-t">

                            <!-- USER -->
                            <td class="p-4">
                                <div>
                                    <p class="font-medium text-black">
                                        <?php echo htmlspecialchars($row['user_name']); ?>
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <?php echo htmlspecialchars($row['user_email']); ?>
                                    </p>
                                </div>
                            </td>

                            <!-- TRIP -->
                            <td class="p-4 text-gray-700">
                                <?php echo htmlspecialchars($row['trip_title']); ?>
                            </td>

                            <!-- AMOUNT -->
                            <td class="p-4 text-gray-700">
                                $<?php echo $row['amount']; ?>
                            </td>

                            <!-- REFERENCE -->
                            <td class="p-4 text-gray-500 text-xs">
                                <?php echo $row['reference']; ?>
                            </td>

                            <!-- STATUS -->
                            <td class="p-4">
                                <?php if($row['status'] == 'Paid'): ?>
                                    <span class="text-green-600 text-xs">Paid</span>
                                <?php elseif($row['status'] == 'Pending'): ?>
                                    <span class="text-yellow-600 text-xs">Pending</span>
                                <?php else: ?>
                                    <span class="text-red-600 text-xs">Failed</span>
                                <?php endif; ?>
                            </td>

                            <!-- DATE -->
                            <td class="p-4 text-gray-500 text-xs">
                                <?php echo $row['created_at']; ?>
                            </td>

                        </tr>

                        <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

</body>
</html>