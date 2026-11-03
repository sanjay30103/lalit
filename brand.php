<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Brand Kit | ' . $site['name'];
$pageDesc  = 'Logo, colours and typography of Guru Gorakhnath Construction.';
require __DIR__ . '/includes/header.php';

$colors = [
    ['Kumkum', '#9A2820', 'bg-kumkum-700', 'text-cream', 'Primary - roof, buttons, headings accent'],
    ['Haldi',  '#F0B429', 'bg-haldi-400',  'text-ink-950', 'Accent - rising sun, highlights'],
    ['Ink',    '#1F1A18', 'bg-ink-900',    'text-cream', 'Text, dark sections'],
    ['Cream',  '#FAF6EF', 'bg-cream',      'text-ink-950', 'Page background'],
    ['Sand',   '#F1E9DC', 'bg-sand',       'text-ink-950', 'Soft panels'],
];
$files = ['logo.svg' => 'Horizontal', 'logo-light.svg' => 'Horizontal (dark bg)', 'logo-stacked.svg' => 'Stacked', 'logo-mark.svg' => 'Mark only', 'logo-mark-light.svg' => 'Mark (dark bg)', 'favicon.svg' => 'Favicon / app icon'];
?>

<section class="bg-blueprint py-14 sm:py-20">
    <div class="wrap">
        <span class="eyebrow">Brand kit</span>
        <h1 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-ink-950 sm:text-6xl">The Guru Gorakhnath mark.</h1>
        <p class="mt-4 max-w-2xl text-lg text-ink-600">A roof that shelters a <strong>G</strong>-shaped home, with a rising sun inside - the Guru's blessing and every family's new beginning.</p>

        <div class="mt-12 grid gap-5 lg:grid-cols-[1.3fr_1fr]">
            <div class="flex flex-col items-center justify-center rounded-[2rem] border border-line bg-white p-10 sm:p-16">
                <?= logo_mark('size-40 sm:size-52') ?>
                <p class="mt-6 font-display text-4xl font-extrabold tracking-tight text-ink-950 sm:text-5xl">Guru Gorakhnath</p>
                <p class="mt-2 text-sm font-bold tracking-[0.45em] text-kumkum-700">CONSTRUCTION</p>
                <p class="mt-4 font-hindi text-xl text-ink-500"><?= e($site['tagline_hi']) ?></p>
            </div>
            <div class="grid gap-5">
                <div class="flex items-center gap-4 rounded-[2rem] bg-ink-950 p-8">
                    <?= logo_mark('size-16 shrink-0', true) ?>
                    <span class="leading-none"><span class="block font-display text-2xl font-extrabold text-cream">Guru Gorakhnath</span><span class="mt-1.5 block text-[11px] font-bold tracking-[0.3em] text-haldi-400">CONSTRUCTION</span></span>
                </div>
                <div class="flex items-center gap-4 rounded-[2rem] bg-kumkum-700 p-8">
                    <span class="flex size-16 shrink-0 items-center justify-center rounded-2xl bg-cream"><?= logo_mark('size-12') ?></span>
                    <span class="font-hindi text-2xl text-cream"><?= e($site['name_hi']) ?></span>
                </div>
                <div class="grid grid-cols-3 gap-5">
                    <?php foreach (['bg-haldi-400', 'bg-sand', 'bg-white border border-line'] as $bg): ?>
                        <div class="flex aspect-square items-center justify-center rounded-3xl <?= $bg ?>"><?= logo_mark('size-14') ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="wrap">
        <h2 class="font-display text-3xl font-extrabold text-ink-950">Colours</h2>
        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            <?php foreach ($colors as [$n, $hex, $bg, $fg, $use]): ?>
                <div class="overflow-hidden rounded-3xl border border-line bg-white">
                    <div class="flex h-32 items-end p-4 <?= $bg ?> <?= $fg ?>"><span class="font-display text-xl font-bold"><?= e($n) ?></span></div>
                    <div class="p-4"><p class="font-mono text-sm font-bold"><?= e($hex) ?></p><p class="mt-1 text-xs text-ink-500"><?= e($use) ?></p></div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="mt-16 font-display text-3xl font-extrabold text-ink-950">Typography</h2>
        <div class="mt-6 grid gap-4 lg:grid-cols-3">
            <div class="rounded-3xl border border-line bg-white p-6"><p class="text-xs font-bold text-ink-500 uppercase">Display</p><p class="mt-3 font-display text-4xl font-extrabold">Bricolage Grotesque</p></div>
            <div class="rounded-3xl border border-line bg-white p-6"><p class="text-xs font-bold text-ink-500 uppercase">Body</p><p class="mt-3 text-3xl font-semibold">Manrope</p></div>
            <div class="rounded-3xl border border-line bg-white p-6"><p class="text-xs font-bold text-ink-500 uppercase">Hindi</p><p class="mt-3 font-hindi text-3xl">तिरो देवनागरी हिंदी</p></div>
        </div>

        <h2 class="mt-16 font-display text-3xl font-extrabold text-ink-950">Download files</h2>
        <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($files as $f => $label): ?>
                <a href="assets/brand/<?= e($f) ?>" download class="flex items-center justify-between rounded-2xl border border-line bg-white p-4 font-semibold transition hover:border-kumkum-700/40">
                    <span><?= e($label) ?> <span class="block font-mono text-xs font-normal text-ink-500"><?= e($f) ?></span></span>
                    <?= icon('arrow-ur', 'size-4 text-kumkum-700') ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
