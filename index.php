<?php
require __DIR__ . '/includes/functions.php';
require __DIR__ . '/includes/header.php';

$paths = [
    ['icon' => 'map',     'hi' => 'प्लॉट ख़रीदना है', 'title' => 'Buy a plot',        'href' => 'properties.php?type=plot'],
    ['icon' => 'hardhat', 'hi' => 'घर बनवाना है',     'title' => 'Build my house',    'href' => 'services.php#construction'],
    ['icon' => 'key',     'hi' => 'बना बनाया मकान',   'title' => 'Buy a ready home',  'href' => 'properties.php?type=house'],
];
?>

<!-- ============ HERO ============ -->
<section class="relative overflow-hidden bg-blueprint">
    <div class="pointer-events-none absolute -top-40 -left-40 size-[32rem] rounded-full bg-haldi-300/25 blur-3xl" aria-hidden="true"></div>

    <div class="wrap relative grid items-center gap-14 pt-10 pb-16 lg:grid-cols-[1.05fr_1fr] lg:pt-16 lg:pb-24">
        <div>
            <p class="inline-flex items-center gap-2 rounded-full border border-kumkum-700/15 bg-white/70 py-1.5 pr-4 pl-1.5 text-xs font-bold text-ink-700" data-reveal>
                <span class="rounded-full bg-kumkum-700 px-2.5 py-1 text-[10px] tracking-wider text-cream">HALDWANI</span>
                Kusumkhera · Kamaluaganja · Nainital district
            </p>

            <p class="mt-7 font-hindi text-2xl text-kumkum-700 sm:text-3xl" data-reveal><?= e($site['tagline_hi']) ?></p>
            <h1 class="mt-3 font-display text-[2.6rem] leading-[1.02] font-extrabold tracking-tight text-balance text-ink-950 sm:text-6xl lg:text-7xl" data-reveal>
                From your <span class="text-kumkum-700">plot</span>
                to your <span class="relative inline-block pt-2 font-hindi font-normal tracking-normal whitespace-nowrap text-kumkum-700" lang="hi">गृह प्रवेश<svg class="absolute -bottom-3 left-0 w-full text-haldi-400" viewBox="0 0 120 10" preserveAspectRatio="none" aria-hidden="true"><path d="M2 7c30-5 80-6 116-2" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg></span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-ink-600" data-reveal>
                Buy a verified plot, get your house built - naksha pass to final finishing - or move straight into a ready-made home. One trusted contractor, start to finish.
            </p>

            <!-- Three paths -->
            <div class="mt-9" data-reveal>
                <p class="text-xs font-bold tracking-[0.18em] text-ink-500 uppercase">I want to…</p>
                <div class="mt-3 grid gap-3 sm:grid-cols-3">
                    <?php foreach ($paths as $p): ?>
                        <a href="<?= e($p['href']) ?>" class="group flex items-center gap-3 rounded-2xl border border-line bg-white p-4 transition hover:-translate-y-0.5 hover:border-kumkum-700/30 hover:shadow-xl hover:shadow-kumkum-900/5 sm:flex-col sm:items-start">
                            <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-kumkum-50 text-kumkum-700 transition group-hover:bg-kumkum-700 group-hover:text-cream"><?= icon($p['icon'], 'size-5') ?></span>
                            <span class="flex-1">
                                <span class="block font-display text-base font-bold text-ink-950"><?= e($p['title']) ?></span>
                                <span class="block font-hindi text-sm text-ink-500"><?= e($p['hi']) ?></span>
                            </span>
                            <?= icon('arrow', 'size-4 text-ink-400 transition group-hover:translate-x-1 group-hover:text-kumkum-700 sm:hidden') ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3" data-reveal>
                <a href="<?= tel_link($site['phones'][0]) ?>" class="btn-primary text-base"><?= icon('phone', 'size-4') ?> Call <?= e($site['owner']) ?></a>
                <a href="#estimate" class="btn-ghost text-base"><?= icon('calc', 'size-4') ?> Estimate my cost</a>
            </div>
        </div>

        <!-- Visual: arched collage -->
        <div class="relative mx-auto w-full max-w-lg lg:max-w-none" data-reveal>
            <div class="grid grid-cols-[1.25fr_1fr] gap-4">
                <div class="arch row-span-2 overflow-hidden border-[6px] border-white shadow-2xl shadow-ink-900/20">
                    <img src="<?= img('villa-modern-1.jpg') ?>" alt="Modern two-storey house with large windows" class="aspect-[3/4.4] size-full object-cover" fetchpriority="high">
                </div>
                <div class="overflow-hidden rounded-3xl border-[6px] border-white shadow-xl shadow-ink-900/10">
                    <img src="<?= img('plot-field.jpg') ?>" alt="Open plot of land at sunrise" class="aspect-square size-full object-cover">
                </div>
                <div class="overflow-hidden rounded-3xl border-[6px] border-white shadow-xl shadow-ink-900/10">
                    <img src="<?= img('site-team.jpg') ?>" alt="Construction team planning at site" class="aspect-square size-full object-cover">
                </div>
            </div>

            <!-- floating cards -->
            <div class="absolute -bottom-6 -left-3 flex animate-float items-center gap-3 rounded-2xl bg-white p-3 pr-5 shadow-2xl shadow-ink-900/15 sm:-left-8">
                <span class="flex size-11 items-center justify-center rounded-xl bg-haldi-400 text-ink-950"><?= icon('shield', 'size-5') ?></span>
                <span class="leading-tight">
                    <span class="block text-sm font-bold text-ink-950">Registered Contractor</span>
                    <span class="block font-mono text-[10px] text-ink-500">Reg. <?= e($site['reg_no']) ?></span>
                </span>
            </div>
            <div class="absolute top-6 -right-2 hidden rounded-2xl bg-ink-950 px-4 py-3 text-cream shadow-2xl sm:block lg:-right-6">
                <p class="text-[10px] font-bold tracking-[0.2em] text-haldi-400 uppercase">Naksha → Chaabi</p>
                <div class="mt-2 flex items-center gap-1.5">
                    <?php foreach (['file', 'hardhat', 'home', 'key'] as $i => $ic): ?>
                        <span class="flex size-7 items-center justify-center rounded-full <?= $i === 3 ? 'bg-haldi-400 text-ink-950' : 'bg-white/10' ?>"><?= icon($ic, 'size-3.5') ?></span>
                        <?php if ($i < 3): ?><span class="h-px w-3 bg-white/30"></span><?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Marquee -->
    <div class="relative overflow-hidden border-y border-ink-900/10 bg-ink-950 py-4 text-cream" aria-hidden="true">
        <div class="flex w-max animate-marquee gap-10 font-display text-lg font-bold whitespace-nowrap">
            <?php for ($r = 0; $r < 2; $r++): foreach (['प्लॉट ख़रीद-बिक्री', 'House construction', 'नक्शा पास', 'Ready-to-move homes', 'बना बनाया मकान', 'Renovation & extension', 'मकान निर्माण', 'Commercial buildings'] as $w): ?>
                <span class="flex items-center gap-10 <?= preg_match('/\p{Devanagari}/u', $w) ? 'font-hindi font-normal text-haldi-400' : '' ?>"><?= e($w) ?> <span class="text-kumkum-500">✦</span></span>
            <?php endforeach; endfor; ?>
        </div>
    </div>
</section>

<!-- ============ STATS ============ -->
<section class="border-b border-line bg-white">
    <div class="wrap grid grid-cols-2 divide-line lg:grid-cols-4 lg:divide-x">
        <?php foreach ($stats as $i => $s): ?>
            <div class="px-2 py-8 sm:px-6 lg:py-10 <?= $i % 2 ? 'border-l border-line lg:border-l-0' : '' ?> <?= $i > 1 ? 'border-t border-line lg:border-t-0' : '' ?>" data-reveal>
                <p class="font-display text-4xl font-extrabold tracking-tight text-ink-950 sm:text-5xl"><span data-count="<?= (int) $s['value'] ?>">0</span><span class="text-kumkum-700"><?= e($s['suffix']) ?></span></p>
                <p class="mt-2 text-sm font-semibold text-ink-700"><?= e($s['label']) ?></p>
                <p class="font-hindi text-sm text-ink-500"><?= e($s['hi']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============ THREE PILLARS ============ -->
<section class="py-20 sm:py-28">
    <div class="wrap">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end" data-reveal>
            <div class="max-w-2xl">
                <span class="eyebrow">What we do</span>
                <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Three ways to your own home. One name you can trust.</h2>
            </div>
            <p class="font-hindi text-xl text-ink-500 md:text-right">तीन रास्ते, एक भरोसा</p>
        </div>

        <div class="mt-14 grid gap-6 lg:grid-cols-3">
            <?php foreach (array_slice($services, 0, 3) as $i => $s): ?>
                <a href="services.php#<?= e($s['slug']) ?>" class="group relative flex min-h-[30rem] flex-col justify-end overflow-hidden rounded-[2rem] p-7 text-cream" data-reveal>
                    <img src="<?= img($s['image']) ?>" alt="" loading="lazy" class="absolute inset-0 size-full object-cover transition duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-ink-950/60 to-ink-950/0"></div>
                    <span class="absolute top-6 left-7 font-display text-7xl font-extrabold text-cream/15">0<?= $i + 1 ?></span>
                    <div class="relative">
                        <span class="flex size-12 items-center justify-center rounded-2xl bg-haldi-400 text-ink-950"><?= icon($s['icon'], 'size-6') ?></span>
                        <p class="mt-5 font-hindi text-lg text-haldi-300"><?= e($s['hi']) ?></p>
                        <h3 class="font-display text-3xl font-bold"><?= e($s['title']) ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-cream/75"><?= e($s['short']) ?></p>
                        <ul class="mt-5 grid max-h-0 gap-2 overflow-hidden text-sm text-cream/85 opacity-0 transition-all duration-500 group-hover:max-h-40 group-hover:opacity-100 group-focus-visible:max-h-40 group-focus-visible:opacity-100">
                            <?php foreach (array_slice($s['points'], 0, 3) as $pt): ?>
                                <li class="flex gap-2"><?= icon('check', 'size-4 shrink-0 text-haldi-400') ?><?= e($pt) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-haldi-300">Learn more <?= icon('arrow', 'size-4 transition group-hover:translate-x-1') ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-3" data-reveal>
            <?php foreach (array_slice($services, 3) as $s): ?>
                <a href="services.php#<?= e($s['slug']) ?>" class="group flex items-center gap-4 rounded-2xl border border-line bg-white p-5 transition hover:border-kumkum-700/30">
                    <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-sand text-kumkum-700"><?= icon($s['icon'], 'size-5') ?></span>
                    <span class="flex-1">
                        <span class="block font-display font-bold text-ink-950"><?= e($s['title']) ?></span>
                        <span class="block font-hindi text-sm text-ink-500"><?= e($s['hi']) ?></span>
                    </span>
                    <?= icon('arrow', 'size-4 text-ink-400 transition group-hover:translate-x-1 group-hover:text-kumkum-700') ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ JOURNEY ============ -->
<section class="relative border-y border-line bg-sand/60 py-20 sm:py-28">
    <div class="wrap grid gap-14 lg:grid-cols-[0.85fr_1.15fr]">
        <div class="lg:sticky lg:top-28 lg:self-start" data-reveal>
            <span class="eyebrow">How it works</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Naksha se chaabi tak - <span class="text-kumkum-700">six clear steps.</span></h2>
            <p class="mt-3 font-hindi text-xl text-ink-500">नक्शे से चाबी तक</p>
            <p class="mt-6 max-w-md leading-relaxed text-ink-600">No confusion, no surprises. You always know what stage your house is at, what it costs, and what happens next.</p>
            <div class="arch mt-10 hidden aspect-[4/5] max-w-xs overflow-hidden border-8 border-white shadow-xl lg:block">
                <img src="<?= img('blueprint.jpg') ?>" alt="Engineer drawing a house plan" loading="lazy" class="size-full object-cover">
            </div>
        </div>

        <ol class="relative space-y-4">
            <span class="absolute top-10 bottom-10 left-12 w-0.5 sm:left-[52px] bg-gradient-to-b from-kumkum-700 via-haldi-400 to-kumkum-700/0" aria-hidden="true"></span>
            <?php foreach ($journey as $i => $j): ?>
                <li class="relative flex gap-5 rounded-3xl border border-line bg-white p-5 sm:p-6" data-reveal>
                    <span class="relative z-10 flex size-14 shrink-0 items-center justify-center rounded-2xl <?= $i === count($journey) - 1 ? 'bg-haldi-400 text-ink-950' : 'bg-kumkum-700 text-cream' ?> font-display text-xl font-extrabold"><?= $i + 1 ?></span>
                    <div>
                        <p class="font-hindi text-sm text-kumkum-700"><?= e($j['hi']) ?></p>
                        <h3 class="font-display text-xl font-bold text-ink-950"><?= e($j['title']) ?></h3>
                        <p class="mt-1.5 leading-relaxed text-ink-600"><?= e($j['text']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- ============ ESTIMATOR ============ -->
<?php include __DIR__ . '/partials/estimator.php'; ?>

<!-- ============ PROPERTIES ============ -->
<section class="py-20 sm:py-28">
    <div class="wrap">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end" data-reveal>
            <div>
                <span class="eyebrow">Available now</span>
                <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-ink-950 sm:text-5xl">Plots & homes in Haldwani</h2>
                <p class="mt-2 font-hindi text-xl text-ink-500">उचित मूल्य पर प्लॉट और मकान उपलब्ध</p>
            </div>
            <div class="flex flex-wrap gap-2" role="tablist" aria-label="Filter properties" data-filter-group="home-props">
                <button type="button" class="chip is-active rounded-full border border-ink-900 bg-ink-900 px-4 py-2 text-sm font-bold text-cream transition" data-filter="all">All</button>
                <?php foreach ($propertyTypes as $k => $t): ?>
                    <button type="button" class="chip rounded-full border border-line bg-white px-4 py-2 text-sm font-bold text-ink-700 transition hover:border-ink-900/40" data-filter="<?= e($k) ?>"><?= e($t['label']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-filter-target="home-props">
            <?php foreach (array_slice($properties, 0, 6) as $p) { include __DIR__ . '/partials/property-card.php'; } ?>
        </div>
        <div class="mt-10 text-center">
            <a href="properties.php" class="btn-primary">See all plots & homes <?= icon('arrow', 'size-4') ?></a>
        </div>
    </div>
</section>

<!-- ============ WORK GALLERY ============ -->
<section class="bg-white py-20 sm:py-28">
    <div class="wrap">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end" data-reveal>
            <div class="max-w-2xl">
                <span class="eyebrow">Our work</span>
                <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Homes built with care, brick by brick.</h2>
            </div>
            <a href="projects.php" class="btn-ghost self-start md:self-auto">View all work <?= icon('arrow', 'size-4') ?></a>
        </div>

        <div class="mt-12 grid auto-rows-[11rem] grid-cols-2 gap-4 sm:auto-rows-[14rem] lg:grid-cols-4">
            <?php
            $bento = [
                [$projects[0], 'col-span-2 row-span-2'],
                [$projects[3], ''],
                [$projects[2], ''],
                [$projects[4], ''],
                [$projects[5], ''],
            ];
            foreach ($bento as [$pr, $cls]): ?>
                <figure class="group relative overflow-hidden rounded-3xl <?= $cls ?>" data-reveal>
                    <img src="<?= img($pr['image']) ?>" alt="<?= e($pr['title']) ?>" loading="lazy" class="size-full object-cover transition duration-700 group-hover:scale-105">
                    <figcaption class="absolute inset-x-3 bottom-3 flex items-center justify-between rounded-2xl bg-white/90 px-4 py-2.5 backdrop-blur transition">
                        <span>
                            <span class="block text-sm font-bold text-ink-950"><?= e($pr['title']) ?></span>
                            <span class="block text-xs text-ink-500"><?= e($pr['location']) ?></span>
                        </span>
                        <span class="hidden rounded-full bg-sand px-2 py-0.5 text-[10px] font-bold text-ink-700 uppercase sm:inline"><?= e($projectCategories[$pr['category']]) ?></span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ OWNER + VALUES ============ -->
<section class="py-20 sm:py-28">
    <div class="wrap grid gap-12 lg:grid-cols-2 lg:items-center">
        <div class="relative" data-reveal>
            <div class="relative overflow-hidden rounded-[2rem] bg-ink-950 p-8 text-cream sm:p-12">
                <div class="absolute inset-0 bg-blueprint-dark" aria-hidden="true"></div>
                <div class="relative">
                    <?= icon('quote', 'size-10 text-haldi-400') ?>
                    <p class="mt-6 font-hindi text-2xl leading-relaxed sm:text-3xl">"घर सिर्फ़ ईंट और सीमेंट नहीं, एक परिवार का सपना होता है। हम हर मकान ऐसे बनाते हैं जैसे अपना हो।"</p>
                    <p class="mt-4 text-sm text-cream/60">"A house isn't just bricks and cement - it's a family's dream. We build every home as if it were our own."</p>
                    <div class="mt-8 flex items-center gap-4 border-t border-white/10 pt-6">
                        <span class="flex size-14 items-center justify-center rounded-full bg-haldi-400 font-display text-lg font-extrabold text-ink-950">LN</span>
                        <span>
                            <span class="block font-display text-lg font-bold"><?= e($site['owner']) ?></span>
                            <span class="block text-sm text-cream/60"><?= e($site['owner_title']) ?></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <span class="eyebrow" data-reveal>Why families choose us</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl" data-reveal>विश्वास, गुणवत्ता एवं समय पर कार्य - <span class="text-kumkum-700">our identity.</span></h2>
            <div class="mt-10 grid gap-5 sm:grid-cols-2">
                <?php foreach ($values as $v): ?>
                    <div class="rounded-2xl border border-line bg-white p-5" data-reveal>
                        <span class="flex size-11 items-center justify-center rounded-xl bg-kumkum-50 text-kumkum-700"><?= icon($v['icon'], 'size-5') ?></span>
                        <h3 class="mt-4 font-display text-lg font-bold text-ink-950"><?= e($v['title']) ?></h3>
                        <p class="mt-1.5 text-sm leading-relaxed text-ink-600"><?= e($v['text']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/faq.php'; ?>
<?php include __DIR__ . '/partials/cta.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
