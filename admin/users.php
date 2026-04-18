<?php
include __DIR__ . '/../includes/auth.php';
include __DIR__ . '/../includes/db.php';
requireLogin();


// ================= PAGINATION SETUP =================
$limit = 10;

// current page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

// offset
$offset = ($page - 1) * $limit;

// total users
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM users");
$totalUsers = $totalResult->fetch_assoc()['total'] ?? 0;

$totalPages = ceil($totalUsers / $limit);


// ================= DELETE USER =================
if (isset($_GET['delete'])) {

    $id = (int) $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: users.php");
    exit();
}


// ================= EDIT USER FETCH =================
$editUser = null;

if (isset($_GET['edit'])) {

    $id = (int) $_GET['edit'];

    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $editUser = $stmt->get_result()->fetch_assoc();
}


// ================= UPDATE USER =================
if (isset($_POST['update_user'])) {

    $id = (int) $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();

    header("Location: users.php");
    exit();
}


// ================= USERS LIST (PAGINATED) =================
$stmt = $conn->prepare("
    SELECT id, name, email, created_at
    FROM users
    ORDER BY id DESC
    LIMIT ? OFFSET ?
");

$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();

$users = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Users | Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<div class="flex min-h-screen">

<?php include 'components/sidebar.php'; ?>

<!-- ================= MAIN ================= -->
<main class="flex-1">

    <!-- TOP BAR -->
    <div class="flex items-center justify-between px-6 py-5 border-b">
        <h2 class="text-xl font-light">Users Management</h2>
        <div class="text-sm text-gray-500">Admin Panel</div>
    </div>

    <div class="p-6 space-y-8">

        <!-- ================= EDIT FORM ================= -->
        <?php if ($editUser): ?>
        <div class="border rounded-xl p-6">

            <h3 class="text-lg font-light mb-4">Edit User</h3>

            <form method="POST" class="space-y-4">

                <input type="hidden" name="id" value="<?= $editUser['id'] ?>">

                <input type="text" name="name"
                       value="<?= htmlspecialchars($editUser['name']) ?>"
                       class="w-full border px-4 py-2 rounded-lg" required>

                <input type="email" name="email"
                       value="<?= htmlspecialchars($editUser['email']) ?>"
                       class="w-full border px-4 py-2 rounded-lg" required>

                <button type="submit" name="update_user"
                        class="bg-black text-white px-5 py-2 rounded-full text-sm">
                    Update User
                </button>

                <a href="users.php"
                   class="ml-3 text-sm text-gray-500 underline">
                    Cancel
                </a>

            </form>

        </div>
        <?php endif; ?>


        <!-- ================= USERS TABLE ================= -->
        <div class="border rounded-xl p-6">

            <h3 class="text-lg font-light mb-4">All Users</h3>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Date</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if ($users->num_rows > 0): ?>

                            <?php while ($u = $users->fetch_assoc()): ?>
                                <tr class="border-b">

                                    <td class="py-3"><?= $u['id'] ?></td>
                                    <td><?= htmlspecialchars($u['name']) ?></td>
                                    <td><?= htmlspecialchars($u['email']) ?></td>
                                    <td><?= date('Y-m-d', strtotime($u['created_at'])) ?></td>

                                    <td class="flex gap-3 py-3">

                                        <a href="?edit=<?= $u['id'] ?>"
                                           class="text-blue-600 text-sm hover:underline">
                                            Edit
                                        </a>

                                        <a href="?delete=<?= $u['id'] ?>"
                                           onclick="return confirm('Delete this user?')"
                                           class="text-red-600 text-sm hover:underline">
                                            Delete
                                        </a>

                                    </td>

                                </tr>
                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-400">
                                    No users found
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ================= PAGINATION (UNCHANGED COMPONENT) ================= -->
        <?php include __DIR__ . '/components/pagination.php'; ?>

    </div>

</main>

</div>

</body>
</html>