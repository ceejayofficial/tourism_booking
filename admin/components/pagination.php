<?php if ($totalPages > 1): ?>

<div class="flex justify-center pb-16">

    <div class="flex gap-2">

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>

            <a href="?page=<?= $i; ?>"
               class="px-4 py-2 border rounded-full text-sm transition
               <?= ($i == $page) ? 'bg-black text-white' : 'text-black hover:bg-gray-100'; ?>">

                <?= $i; ?>

            </a>

        <?php endfor; ?>

    </div>

</div>

<?php endif; ?>