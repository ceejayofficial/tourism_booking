<?php
include 'includes/db.php';

/*
------------------------------------
FETCH VISION & MISSION FROM DB
------------------------------------
*/
$content = [];

$sql = "SELECT section, title, content FROM site_content WHERE section IN ('vision', 'mission')";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $content[$row['section']] = $row;
}

// fallback safety
$vision  = $content['vision']  ?? ['title' => 'Vision', 'content' => 'No vision set yet'];
$mission = $content['mission'] ?? ['title' => 'Mission', 'content' => 'No mission set yet'];
?>

<section class="bg-white py-24 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-16">

            <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">
                Our Purpose
            </p>

            <h2 class="text-3xl md:text-4xl font-light text-black">
                Vision & Mission
            </h2>

        </div>

        <!-- GRID -->
        <div class="grid md:grid-cols-2 gap-10">

            <!-- VISION -->
            <div class="border rounded-3xl p-10 hover:shadow-sm transition bg-white">

                <div class="mb-5 text-black">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    </svg>
                </div>

                <h3 class="text-xl font-light text-black mb-4">
                    <?= htmlspecialchars($vision['title']); ?>
                </h3>

                <p class="text-gray-600 leading-relaxed text-[15px]">
                    <?= nl2br(htmlspecialchars($vision['content'])); ?>
                </p>

            </div>

            <!-- MISSION -->
            <div class="border rounded-3xl p-10 hover:shadow-sm transition bg-white">

                <div class="mb-5 text-black">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 2l3 7 7 3-7 3-3 7-3-7-7-3 7-3 3-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 12l6-2-2 6-4-4z"/>
                    </svg>
                </div>

                <h3 class="text-xl font-light text-black mb-4">
                    <?= htmlspecialchars($mission['title']); ?>
                </h3>

                <p class="text-gray-600 leading-relaxed text-[15px]">
                    <?= nl2br(htmlspecialchars($mission['content'])); ?>
                </p>

            </div>

        </div>

    </div>

</section>