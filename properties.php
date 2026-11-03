<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Plots & Ready Homes for Sale in Haldwani | ' . $site['name'];
$pageDesc  = 'Residential plots, ready-to-move independent houses and under-construction homes in Kusumkhera, Kamaluaganja and across Haldwani. Clear papers, fair prices.';
require __DIR__ . '/includes/header.php';

$initialType = isset($_GET['type'], $propertyTypes[$_GET['type']]) ? $_GET['type'] : 'all';
$locations = array_values(array_unique(array_column($properties, 'location')));
sort($locations);

page_hero(
    'Plots & Homes',
    'Plots and homes, <span class="text-kumkum-700">with papers you can trust.</span>',
    'प्लॉट एवं मकान - उचित मूल्य पर',
    'Every listing is personally checked by us - title, approvals and access road. Shortlist on WhatsApp and we\'ll arrange a site visit.',
    'house-cream.jpg'
);
?>

<section class="py-14 sm:py-20">
    <div class="wrap">
        <!-- Filter bar -->
        <div class="rounded-3xl border border-line bg-white p-3 shadow-sm sm:p-4" data-reveal>
            <div class="grid gap-3 lg:grid-cols-[1fr_auto_auto] lg:items-center">
                <label class="relative block">
                    <span class="sr-only">Search</span>
                    <?= icon('search', 'pointer-events-none absolute top-1/2 left-4 size-4 -translate-y-1/2 text-ink-500') ?>
                    <input id="prop-search" type="search" placeholder="Search by area, e.g. Kusumkhera, corner, 3 BHK…" class="field pl-11">
                </label>
                <label class="block">
                    <span class="sr-only">Location</span>
                    <select id="prop-location" class="field pr-10 lg:w-52">
                        <option value="all">All locations</option>
                        <?php foreach ($locations as $loc): ?>
                            <option value="<?= e($loc) ?>"><?= e($loc) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <div class="flex flex-wrap gap-2" role="tablist" aria-label="Property type" data-filter-group="props">
                    <button type="button" class="chip rounded-full border px-4 py-2.5 text-sm font-bold transition <?= $initialType === 'all' ? 'is-active border-ink-900 bg-ink-900 text-cream' : 'border-line bg-white text-ink-700' ?>" data-filter="all">All</button>
                    <?php foreach ($propertyTypes as $k => $t): ?>
                        <button type="button" class="chip rounded-full border px-4 py-2.5 text-sm font-bold transition <?= $initialType === $k ? 'is-active border-ink-900 bg-ink-900 text-cream' : 'border-line bg-white text-ink-700' ?>" data-filter="<?= e($k) ?>"><?= e($t['label']) ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <p class="mt-6 text-sm text-ink-500"><span id="prop-count"><?= count($properties) ?></span> properties found</p>

        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-filter-target="props" data-initial="<?= e($initialType) ?>">
            <?php foreach ($properties as $p) { include __DIR__ . '/partials/property-card.php'; } ?>
        </div>

        <div id="prop-empty" class="mt-6 hidden rounded-3xl border border-dashed border-line bg-white p-12 text-center">
            <p class="font-display text-xl font-bold text-ink-950">No match right now.</p>
            <p class="mt-2 text-ink-600">Tell us what you're looking for - new plots come to us every week.</p>
            <a href="<?= e(wa_link('Namaste, mujhe Haldwani me plot/makaan chahiye. Meri requirement: ')) ?>" target="_blank" rel="noopener" class="btn-wa mt-6"><?= icon('whatsapp', 'size-4') ?> Share my requirement</a>
        </div>

        <!-- Sell with us -->
        <div class="mt-16 grid items-center gap-8 overflow-hidden rounded-[2rem] border border-line bg-sand p-8 sm:p-10 lg:grid-cols-[1.4fr_1fr]" data-reveal>
            <div>
                <span class="eyebrow">Want to sell?</span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">Have a plot or house to sell? We have genuine buyers.</h2>
                <p class="mt-2 font-hindi text-lg text-ink-500">अपना प्लॉट या मकान बेचना है? हमसे संपर्क करें।</p>
                <p class="mt-4 max-w-lg text-ink-600">Share the location, size and papers - we'll value it honestly and connect you with serious buyers from our network.</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="<?= e(wa_link('Namaste, mujhe apni property bechni hai. Location: , Size: ')) ?>" target="_blank" rel="noopener" class="btn-wa text-base"><?= icon('whatsapp', 'size-4') ?> Send details on WhatsApp</a>
                <a href="contact.php?service=plots#enquiry" class="btn-ghost text-base">Fill the enquiry form</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
