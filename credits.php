<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Photo Credits | ' . $site['name'];
$pageDesc  = 'Credits and licences for photographs used on this website.';
require __DIR__ . '/includes/header.php';

$credits = json_decode((string) file_get_contents(__DIR__ . '/assets/images/site/credits.json'), true) ?: [];
?>

<section class="bg-blueprint py-14 sm:py-20">
    <div class="wrap">
        <span class="eyebrow">Photo credits</span>
        <h1 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-ink-950 sm:text-5xl">Photographs on this site</h1>
        <p class="mt-4 max-w-2xl text-ink-600">Sample photographs are used under free licences from Wikimedia Commons and Unsplash. We thank the photographers below.</p>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($credits as $c): ?>
                <a href="<?= e($c['source']) ?>" target="_blank" rel="noopener" class="flex gap-4 rounded-2xl border border-line bg-white p-3 transition hover:border-kumkum-700/40">
                    <img src="<?= img($c['file']) ?>" alt="" loading="lazy" class="size-20 shrink-0 rounded-xl object-cover">
                    <span class="min-w-0 text-sm">
                        <span class="block truncate font-bold text-ink-950"><?= e($c['title']) ?></span>
                        <span class="block truncate text-ink-600">by <?= e($c['author']) ?></span>
                        <span class="mt-1 inline-block rounded-full bg-sand px-2 py-0.5 text-[11px] font-semibold text-ink-700"><?= e($c['license']) ?></span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
