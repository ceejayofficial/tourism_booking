<?php
include __DIR__ . '/../includes/auth.php';
requireLogin();
include __DIR__ . '/../includes/db.php';

$result = $conn->query("SELECT * FROM site_content ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Content Manager</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
</style>
</head>

<body class="bg-white">

<div class="flex min-h-screen">

 <?php include 'components/sidebar.php'; ?>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-1 p-6">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-xl font-light">Website Content Manager</h1>
            <p class="text-sm text-gray-500">
                Manage Vision, Mission, About, Footer etc.
            </p>
        </div>

        <!-- ➕ ADD CONTENT -->
        <form action="../process/add-content.php" method="POST"
              class="border rounded-xl p-6 mb-10 space-y-4">

            <h2 class="text-lg font-light">Add New Content</h2>

            <!-- DROPDOWN -->
            <select name="section" required
                    class="w-full border px-4 py-3 rounded-lg">

                <option value="">Select Section</option>
                <option value="vision">Vision</option>
                <option value="mission">Mission</option>
                <option value="about">About Us</option>
                <option value="footer">Footer</option>
                <option value="hero">Hero Text</option>

            </select>

            <!-- TITLE -->
            <input type="text" name="title" placeholder="Title"
                   class="w-full border px-4 py-3 rounded-lg" required>

            <!-- CONTENT -->
            <textarea name="content" rows="4" placeholder="Content..."
                      class="w-full border px-4 py-3 rounded-lg" required></textarea>

            <!-- BUTTON -->
            <button class="bg-black text-white px-6 py-3 rounded-full text-sm uppercase">
                Add Content
            </button>

        </form>

        <!-- 📋 CONTENT LIST -->
        <div class="grid md:grid-cols-2 gap-6">

            <?php while($row = $result->fetch_assoc()): ?>

            <div class="border rounded-xl p-5 space-y-4">

                <!-- EDIT FORM -->
                <form action="../process/update-content.php" method="POST" class="space-y-3">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <!-- SECTION LABEL -->
                    <div class="text-xs uppercase text-gray-400">
                        <?php echo $row['section']; ?>
                    </div>

                    <!-- TITLE -->
                    <input type="text" name="title"
                           value="<?php echo htmlspecialchars($row['title']); ?>"
                           class="w-full border px-3 py-2 rounded-lg">

                    <!-- CONTENT -->
                    <textarea name="content" rows="4"
                              class="w-full border px-3 py-2 rounded-lg"><?php echo htmlspecialchars($row['content']); ?></textarea>

                    <!-- BUTTONS -->
                    <div class="flex gap-3">

                        <button class="bg-black text-white px-4 py-2 rounded-full text-xs uppercase">
                            Update
                        </button>

                        <a href="../process/delete-content.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Delete this content?')"
                           class="text-red-600 text-xs flex items-center">
                            Delete
                        </a>

                    </div>

                </form>

            </div>

            <?php endwhile; ?>

        </div>

    </main>

</div>

</body>
</html>