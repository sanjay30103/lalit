<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Services - Plots, House Construction, Naksha Pass & Ready Homes | ' . $site['name'];
$pageDesc  = 'House construction, naksha pass, plot buying & selling, ready-to-move homes, commercial buildings and renovation in Haldwani by Guru Gorakhnath Construction.';
require __DIR__ . '/includes/header.php';

page_hero(
    'Services',
    'Everything your home needs - <span class="text-kumkum-700">under one roof.</span>',
    'हमारी सेवाएँ',
    'From finding the right plot to handing you the keys, every step is handled by one accountable team led by ' . $site['owner'] . '.',
    'site-scaffold.jpg'
);
?>

<!-- Quick jump -->
<nav class="sticky top-18 z-30 border-b border-line bg-cream/90 backdrop-blur" aria-label="Services">
    <div class="wrap flex gap-2 overflow-x-auto py-3 [scrollbar-width:none]">
        <?php foreach ($services as $s): ?>
            <a href="#<?= e($s['slug']) ?>" class="inline-flex shrink-0 items-center gap-2 rounded-full border border-line bg-white px-4 py-2 text-sm font-semibold text-ink-700 transition hover:border-kumkum-700/40 hover:text-kumkum-700">
                <?= icon($s['icon'], 'size-4') ?> <?= e($s['title']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</nav>

<section class="py-16 sm:py-24">
    <div class="wrap space-y-20 sm:space-y-28">
        <?php foreach ($services as $i => $s): $flip = $i % 2 === 1; ?>
            <article id="<?= e($s['slug']) ?>" class="grid scroll-mt-40 items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="relative <?= $flip ? 'lg:order-2' : '' ?>" data-reveal>
                    <div class="<?= $i % 3 === 0 ? 'arch' : 'rounded-[2rem]' ?> aspect-[5/4] overflow-hidden border-8 border-white shadow-2xl shadow-ink-900/10">
                        <img src="<?= img($s['image']) ?>" alt="<?= e($s['title']) ?>" loading="lazy" class="size-full object-cover">
                    </div>
                    <span class="absolute -bottom-5 <?= $flip ? '-left-3' : '-right-3' ?> flex size-20 items-center justify-center rounded-3xl bg-kumkum-700 text-cream shadow-xl"><?= icon($s['icon'], 'size-9') ?></span>
                </div>
                <div data-reveal>
                    <p class="font-display text-sm font-extrabold text-haldi-600">0<?= $i + 1 ?> / 0<?= count($services) ?></p>
                    <p class="mt-3 font-hindi text-2xl text-kumkum-700"><?= e($s['hi']) ?></p>
                    <h2 class="font-display text-3xl font-extrabold tracking-tight text-ink-950 sm:text-4xl"><?= e($s['title']) ?></h2>
                    <p class="mt-4 text-lg leading-relaxed text-ink-600"><?= e($s['short']) ?></p>
                    <ul class="mt-7 grid gap-3 sm:grid-cols-2">
                        <?php foreach ($s['points'] as $pt): ?>
                            <li class="flex items-start gap-3 rounded-2xl border border-line bg-white p-4 text-sm font-semibold text-ink-800">
                                <span class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full bg-haldi-400 text-ink-950"><?= icon('check', 'size-3') ?></span>
                                <?= e($pt) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?= e(wa_link('Namaste, mujhe "' . $s['title'] . '" service ke baare me jaankari chahiye.')) ?>" target="_blank" rel="noopener" class="btn-wa"><?= icon('whatsapp', 'size-4') ?> Ask on WhatsApp</a>
                        <a href="contact.php?service=<?= e($s['slug']) ?>#enquiry" class="btn-ghost">Send enquiry <?= icon('arrow', 'size-4') ?></a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php include __DIR__ . '/partials/estimator.php'; ?>
<?php include __DIR__ . '/partials/faq.php'; ?>
<?php include __DIR__ . '/partials/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
