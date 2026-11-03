<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'About Us - ' . $site['owner'] . ', Building Contractor in Haldwani | ' . $site['name'];
$pageDesc  = 'Guru Gorakhnath Construction is a registered building contractor in Kusumkhera, Haldwani, led by ' . $site['owner'] . '. Plots, construction and ready homes built on trust.';
require __DIR__ . '/includes/header.php';

page_hero(
    'About',
    'A local builder who <span class="text-kumkum-700">answers his own phone.</span>',
    'हमारे बारे में',
    'Guru Gorakhnath Construction is a Haldwani-based building contractor and property firm, run personally by ' . $site['owner'] . ' from our office on Kamalua Ganja Road, Kusumkhera.',
    'hills.jpg'
);
?>

<section class="py-20 sm:py-28">
    <div class="wrap grid gap-14 lg:grid-cols-2 lg:items-center">
        <div class="grid grid-cols-2 gap-4" data-reveal>
            <div class="arch col-span-1 row-span-2 aspect-[3/5] overflow-hidden border-[6px] border-white shadow-xl">
                <img src="<?= img('site-rebar.jpg') ?>" alt="Steel reinforcement work at site" loading="lazy" class="size-full object-cover">
            </div>
            <div class="overflow-hidden rounded-3xl border-[6px] border-white shadow-xl">
                <img src="<?= img('blueprint.jpg') ?>" alt="House plan on paper" loading="lazy" class="aspect-square size-full object-cover">
            </div>
            <div class="flex flex-col justify-center rounded-3xl bg-kumkum-700 p-6 text-cream">
                <p class="font-hindi text-lg text-haldi-300">हमारी पहचान</p>
                <p class="mt-1 font-display text-2xl leading-tight font-extrabold">Vishwas. Gunvatta. Samay.</p>
            </div>
        </div>

        <div data-reveal>
            <span class="eyebrow">Our story</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Built in Haldwani, for Haldwani families.</h2>
            <div class="mt-6 space-y-4 text-lg leading-relaxed text-ink-600">
                <p>We started as a building contractor doing what we know best - honest construction work, done properly. Over time, families began asking us for more: <em>"Can you help us find a plot?" "Can you get the naksha passed?" "Do you have a ready house?"</em></p>
                <p>So today we do all of it. Plot buying and selling, complete house construction, and ready-to-move homes - so that a family has <strong class="text-ink-900">one person to trust</strong> from the first site visit to griha pravesh.</p>
                <p>The name comes from our faith in <strong class="text-ink-900">Guru Gorakhnath</strong>. The rising sun in our logo stands for that blessing - and for every new beginning we help build.</p>
            </div>
        </div>
    </div>
</section>

<!-- Owner card -->
<section class="border-y border-line bg-sand/60 py-20 sm:py-24">
    <div class="wrap">
        <div class="grid overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-ink-900/5 lg:grid-cols-[0.9fr_1.1fr]" data-reveal>
            <div class="relative flex min-h-80 items-end bg-ink-950 p-8 text-cream">
                <div class="absolute inset-0 bg-blueprint-dark" aria-hidden="true"></div>
                <div class="absolute inset-0 flex items-center justify-center" aria-hidden="true">
                    <?= logo_mark('size-48 opacity-90', true) ?>
                </div>
                <div class="relative">
                    <p class="text-xs font-bold tracking-[0.2em] text-haldi-400 uppercase">Founder</p>
                    <p class="font-display text-3xl font-extrabold"><?= e($site['owner']) ?></p>
                    <p class="text-cream/60"><?= e($site['owner_title']) ?></p>
                </div>
            </div>
            <div class="p-8 sm:p-12">
                <p class="font-hindi text-2xl leading-relaxed text-ink-900">"आपका पैसा मेहनत की कमाई है। इसलिए हर बोरी सीमेंट, हर सरिया और हर रुपये का हिसाब हम लिखित में देते हैं।"</p>
                <p class="mt-3 text-ink-500">"Your money is hard-earned. That's why we account for every bag of cement, every rod of steel and every rupee - in writing."</p>
                <dl class="mt-8 grid gap-4 border-t border-line pt-8 sm:grid-cols-2">
                    <div><dt class="text-xs font-bold tracking-wider text-ink-500 uppercase">Registration No.</dt><dd class="mt-1 font-mono font-semibold text-ink-900"><?= e($site['reg_no']) ?></dd></div>
                    <div><dt class="text-xs font-bold tracking-wider text-ink-500 uppercase">Office</dt><dd class="mt-1 font-semibold text-ink-900"><?= e($site['office']) ?>, <?= e($site['city']) ?></dd></div>
                    <div><dt class="text-xs font-bold tracking-wider text-ink-500 uppercase">Phone</dt><dd class="mt-1 font-semibold text-ink-900"><?= implode(' · ', array_map(fn($p) => '<a class="hover:text-kumkum-700" href="' . tel_link($p) . '">' . e(fmt_phone($p)) . '</a>', $site['phones'])) ?></dd></div>
                    <div><dt class="text-xs font-bold tracking-wider text-ink-500 uppercase">Email</dt><dd class="mt-1 font-semibold break-all text-ink-900"><a class="hover:text-kumkum-700" href="mailto:<?= e(strtolower($site['email'])) ?>"><?= e(strtolower($site['email'])) ?></a></dd></div>
                </dl>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 sm:py-28">
    <div class="wrap">
        <div class="max-w-2xl" data-reveal>
            <span class="eyebrow">What we stand for</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Four promises we make on every project.</h2>
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($values as $i => $v): ?>
                <div class="group relative overflow-hidden rounded-3xl border border-line bg-white p-7 transition hover:-translate-y-1 hover:shadow-xl hover:shadow-ink-900/5" data-reveal>
                    <span class="absolute -top-3 -right-2 font-hindi text-6xl whitespace-nowrap text-sand transition group-hover:text-kumkum-50"><?= e($v['hi']) ?></span>
                    <span class="relative flex size-12 items-center justify-center rounded-2xl bg-kumkum-700 text-cream"><?= icon($v['icon'], 'size-6') ?></span>
                    <h3 class="relative mt-6 font-display text-xl font-bold text-ink-950"><?= e($v['title']) ?></h3>
                    <p class="relative mt-2 text-sm leading-relaxed text-ink-600"><?= e($v['text']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Service area -->
        <div class="mt-16 rounded-3xl border border-line bg-white p-8 sm:p-10" data-reveal>
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h3 class="font-display text-2xl font-bold text-ink-950">Areas we work in</h3>
                    <p class="mt-1 text-ink-600">Haldwani and nearby - if you're not sure, just call.</p>
                </div>
                <ul class="flex flex-wrap gap-2">
                    <?php foreach (['Kusumkhera', 'Kamaluaganja', 'Lamachaur', 'Kathgharia', 'Bithoria', 'Panchakki', 'Damuadhunga', 'Rampur Road', 'Kathgodam', 'Lalkuan'] as $a): ?>
                        <li class="inline-flex items-center gap-1.5 rounded-full bg-sand px-3.5 py-1.5 text-sm font-semibold text-ink-800"><?= icon('pin', 'size-3.5 text-kumkum-700') ?><?= e($a) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
