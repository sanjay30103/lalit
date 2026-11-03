<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Our Work - Houses & Buildings Built in Haldwani | ' . $site['name'];
$pageDesc  = 'See homes, commercial buildings and interiors built by Guru Gorakhnath Construction across Haldwani, plus work currently on site.';
require __DIR__ . '/includes/header.php';

page_hero(
    'Our Work',
    'Every home here is <span class="text-kumkum-700">someone\'s dream, delivered.</span>',
    'हमारा काम',
    'A look at houses, interiors and buildings we have completed - and the sites we are working on right now.',
    'res-brick-house.jpg'
);
?>

<section class="py-14 sm:py-20">
    <div class="wrap">
        <div class="flex flex-wrap gap-2" role="tablist" aria-label="Filter work" data-filter-group="work" data-reveal>
            <button type="button" class="chip is-active rounded-full border border-ink-900 bg-ink-900 px-4 py-2.5 text-sm font-bold text-cream transition" data-filter="all">All work</button>
            <?php foreach ($projectCategories as $k => $label): ?>
                <button type="button" class="chip rounded-full border border-line bg-white px-4 py-2.5 text-sm font-bold text-ink-700 transition hover:border-ink-900/40" data-filter="<?= e($k) ?>"><?= e($label) ?></button>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 columns-1 gap-5 sm:columns-2 lg:columns-3" data-filter-target="work">
            <?php foreach ($projects as $i => $pr): ?>
                <figure class="group relative mb-5 break-inside-avoid overflow-hidden rounded-3xl bg-sand" data-type="<?= e($pr['category']) ?>">
                    <button type="button" class="block w-full cursor-zoom-in" data-lightbox="<?= img($pr['image']) ?>" data-caption="<?= e($pr['title'] . ' - ' . $pr['location']) ?>" aria-label="View larger: <?= e($pr['title']) ?>">
                        <img src="<?= img($pr['image']) ?>" alt="<?= e($pr['title']) ?>" loading="lazy" class="w-full object-cover transition duration-700 group-hover:scale-105 <?= ['aspect-[4/5]', 'aspect-[4/3]', 'aspect-square'][$i % 3] ?>">
                    </button>
                    <figcaption class="pointer-events-none absolute inset-x-0 bottom-0 flex items-end justify-between bg-gradient-to-t from-ink-950/85 to-transparent p-5 pt-16 text-cream">
                        <span>
                            <span class="block font-display text-lg font-bold"><?= e($pr['title']) ?></span>
                            <span class="flex items-center gap-1 text-xs text-cream/70"><?= icon('pin', 'size-3') ?> <?= e($pr['location']) ?></span>
                        </span>
                        <span class="flex size-9 items-center justify-center rounded-full bg-white/15 backdrop-blur"><?= icon('expand', 'size-4') ?></span>
                    </figcaption>
                    <?php if ($pr['category'] === 'ongoing'): ?>
                        <span class="absolute top-4 left-4 flex items-center gap-1.5 rounded-full bg-haldi-400 px-3 py-1 text-[11px] font-bold text-ink-950"><span class="size-1.5 animate-pulse rounded-full bg-kumkum-700"></span> On site now</span>
                    <?php endif; ?>
                </figure>
            <?php endforeach; ?>
        </div>

        <p class="mt-8 rounded-2xl border border-dashed border-line bg-white p-5 text-center text-sm text-ink-500">
            Want to see a finished house in person? <a href="<?= e(wa_link('Namaste, mujhe aapka bana hua koi ghar dekhna hai.')) ?>" target="_blank" rel="noopener" class="font-bold text-kumkum-700 underline underline-offset-4">Ask us for a site visit</a> - we're happy to show you around.
        </p>
    </div>
</section>

<!-- Lightbox -->
<dialog id="lightbox" class="m-auto max-h-[92vh] w-[min(1100px,94vw)] overflow-visible bg-transparent p-0 backdrop:bg-ink-950/90 backdrop:backdrop-blur-sm">
    <form method="dialog" class="absolute -top-12 right-0">
        <button class="flex size-10 items-center justify-center rounded-full bg-white/10 text-cream hover:bg-white/20" aria-label="Close"><?= icon('x', 'size-5') ?></button>
    </form>
    <img id="lightbox-img" src="" alt="" class="max-h-[82vh] w-full rounded-2xl object-contain">
    <p id="lightbox-cap" class="mt-3 text-center text-sm text-cream/80"></p>
</dialog>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
