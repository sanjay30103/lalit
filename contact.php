<?php
require __DIR__ . '/includes/functions.php';
require __DIR__ . '/includes/enquiry.php';

$requirements = [
    'plot-buy'     => 'Buy a plot',
    'plot-sell'    => 'Sell my plot / property',
    'construction' => 'Build my house',
    'ready-home'   => 'Buy a ready-made house',
    'naksha'       => 'Naksha / map approval',
    'commercial'   => 'Commercial building',
    'renovation'   => 'Renovation / extension',
    'other'        => 'Something else',
];

$errors = [];
$old = ['name' => '', 'phone' => '', 'requirement' => '', 'location' => '', 'budget' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$errors, $old] = handle_enquiry($site, $requirements);
}

// Pre-fill from links like contact.php?property=P101 or ?service=construction
if (!$_POST) {
    $serviceMap = ['plots' => 'plot-buy', 'construction' => 'construction', 'ready-homes' => 'ready-home', 'naksha' => 'naksha', 'commercial' => 'commercial', 'renovation' => 'renovation'];
    if (isset($_GET['service'], $serviceMap[$_GET['service']])) {
        $old['requirement'] = $serviceMap[$_GET['service']];
    }
    if (isset($_GET['property'])) {
        foreach ($properties as $p) {
            if ($p['id'] === $_GET['property']) {
                $old['requirement'] = $p['type'] === 'plot' ? 'plot-buy' : 'ready-home';
                $old['location'] = $p['location'];
                $old['message'] = "I'm interested in {$p['title']} ({$p['id']}), {$p['location']} - {$p['area']}, {$p['price']}.";
            }
        }
    }
}

$sent = isset($_GET['sent']);
$last = $_SESSION['last_enquiry'] ?? null;

$pageTitle = 'Contact - Call, WhatsApp or Visit | ' . $site['name'] . ', Haldwani';
$pageDesc  = 'Contact Guru Gorakhnath Construction, Kamalua Ganja Road, Kusumkhera, Haldwani. Call ' . $site['phones'][0] . ' or WhatsApp ' . $site['whatsapp'] . ' for a free site visit.';
require __DIR__ . '/includes/header.php';

$fieldErr = fn(string $k) => isset($errors[$k]) ? '<p class="mt-1.5 text-sm font-semibold text-kumkum-600">' . e($errors[$k]) . '</p>' : '';
$errCls   = fn(string $k) => isset($errors[$k]) ? ' border-kumkum-500! ring-4 ring-kumkum-500/10' : '';
?>

<section class="relative overflow-hidden bg-blueprint">
    <div class="wrap py-14 sm:py-20">
        <nav class="mb-6 flex items-center gap-2 text-xs font-semibold text-ink-500" aria-label="Breadcrumb">
            <a href="./" class="hover:text-kumkum-700">Home</a><span>/</span><span class="text-ink-900">Contact</span>
        </nav>
        <p class="font-hindi text-xl text-kumkum-700" data-reveal>संपर्क करें</p>
        <h1 class="mt-2 max-w-3xl font-display text-4xl leading-[1.05] font-extrabold tracking-tight text-balance text-ink-950 sm:text-6xl" data-reveal>Call, WhatsApp, or drop by the office. <span class="text-kumkum-700">We're close by.</span></h1>

        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-[1fr_1fr_1fr_1.35fr]">
            <?php foreach ($site['phones'] as $i => $ph): ?>
                <a href="<?= tel_link($ph) ?>" class="group grid grid-cols-[auto_1fr] items-center gap-x-4 rounded-3xl border border-line bg-white p-5 transition sm:block sm:p-6 hover:-translate-y-1 hover:border-kumkum-700/30 hover:shadow-xl hover:shadow-ink-900/5" data-reveal>
                    <span class="row-span-2 flex size-11 items-center justify-center rounded-xl bg-kumkum-700 text-cream"><?= icon('phone', 'size-5') ?></span>
                    <p class="text-xs font-bold tracking-wider text-ink-500 uppercase sm:mt-5">Call <?= $i === 0 ? '(primary)' : '' ?></p>
                    <p class="mt-0.5 font-display text-lg font-bold text-ink-950 sm:mt-1 sm:text-xl"><?= e(fmt_phone($ph)) ?></p>
                </a>
            <?php endforeach; ?>
            <a href="<?= e(wa_link('Namaste, mujhe jaankari chahiye.')) ?>" target="_blank" rel="noopener" class="group grid grid-cols-[auto_1fr] items-center gap-x-4 rounded-3xl border border-line bg-white p-5 transition sm:block sm:p-6 hover:-translate-y-1 hover:border-[#1faa53]/40 hover:shadow-xl hover:shadow-ink-900/5" data-reveal>
                <span class="row-span-2 flex size-11 items-center justify-center rounded-xl bg-[#1faa53] text-white"><?= icon('whatsapp', 'size-5') ?></span>
                <p class="text-xs font-bold tracking-wider text-ink-500 uppercase sm:mt-5">WhatsApp</p>
                <p class="mt-0.5 font-display text-lg font-bold text-ink-950 sm:mt-1 sm:text-xl"><?= e(fmt_phone($site['whatsapp'])) ?></p>
            </a>
            <a href="mailto:<?= e(strtolower($site['email'])) ?>" class="group grid grid-cols-[auto_1fr] items-center gap-x-4 rounded-3xl border border-line bg-white p-5 transition sm:block sm:p-6 hover:-translate-y-1 hover:border-kumkum-700/30 hover:shadow-xl hover:shadow-ink-900/5" data-reveal>
                <span class="row-span-2 flex size-11 items-center justify-center rounded-xl bg-haldi-400 text-ink-950"><?= icon('mail', 'size-5') ?></span>
                <p class="text-xs font-bold tracking-wider text-ink-500 uppercase sm:mt-5">Email</p>
                <p class="mt-0.5 text-[15px] font-bold break-all text-ink-950 sm:mt-1"><?= e(strtolower($site['email'])) ?></p>
            </a>
        </div>
    </div>
</section>

<section id="enquiry" class="scroll-mt-20 py-16 sm:py-24">
    <div class="wrap grid gap-10 lg:grid-cols-[1.15fr_1fr]">
        <!-- Form -->
        <div class="rounded-[2rem] border border-line bg-white p-6 shadow-xl shadow-ink-900/5 sm:p-10" data-reveal>
            <?php if ($sent): ?>
                <div class="py-10 text-center">
                    <span class="mx-auto flex size-16 items-center justify-center rounded-full bg-haldi-400 text-ink-950"><?= icon('check', 'size-8') ?></span>
                    <h2 class="mt-6 font-display text-3xl font-extrabold text-ink-950">Dhanyavaad<?= $last ? ', ' . e($last['name']) : '' ?>!</h2>
                    <p class="mt-1 font-hindi text-lg text-ink-500">आपकी जानकारी हमें मिल गई है।</p>
                    <p class="mx-auto mt-4 max-w-sm text-ink-600">We'll call you back shortly<?= $last ? ' about <strong>' . e(strtolower($last['requirement'])) . '</strong>' : '' ?>. For a faster reply, message us on WhatsApp.</p>
                    <div class="mt-8 flex flex-wrap justify-center gap-3">
                        <a href="<?= e(wa_link('Namaste, maine website par enquiry bheji hai' . ($last ? ' (' . $last['name'] . ')' : '') . '.')) ?>" target="_blank" rel="noopener" class="btn-wa"><?= icon('whatsapp', 'size-4') ?> WhatsApp us</a>
                        <a href="contact.php#enquiry" class="btn-ghost">Send another</a>
                    </div>
                </div>
            <?php else: ?>
                <span class="eyebrow">Free site visit</span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">Tell us what you need.</h2>
                <p class="mt-2 text-ink-600">Fill this in under a minute - we'll call you back the same day.</p>

                <?php if (isset($errors['form'])): ?>
                    <p class="mt-6 rounded-xl bg-kumkum-50 px-4 py-3 text-sm font-semibold text-kumkum-700"><?= e($errors['form']) ?></p>
                <?php endif; ?>

                <form method="post" action="contact.php#enquiry" class="mt-8 grid gap-5 sm:grid-cols-2" novalidate<?= is_static() ? ' data-wa-form="' . e(wa_link()) . '"' : '' ?>>
                    <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                    <div class="hidden" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

                    <div>
                        <label for="f-name" class="mb-1.5 block text-sm font-bold text-ink-800">Your name <span class="text-kumkum-600">*</span></label>
                        <input id="f-name" name="name" type="text" required autocomplete="name" value="<?= e($old['name']) ?>" class="field<?= $errCls('name') ?>" placeholder="e.g. Ramesh Bisht">
                        <?= $fieldErr('name') ?>
                    </div>
                    <div>
                        <label for="f-phone" class="mb-1.5 block text-sm font-bold text-ink-800">Mobile number <span class="text-kumkum-600">*</span></label>
                        <div class="relative">
                            <span class="pointer-events-none absolute top-1/2 left-4 -translate-y-1/2 text-[15px] font-semibold text-ink-500">+91</span>
                            <input id="f-phone" name="phone" type="tel" inputmode="numeric" required autocomplete="tel-national" maxlength="14" value="<?= e($old['phone']) ?>" class="field pl-13<?= $errCls('phone') ?>" placeholder="98765 43210">
                        </div>
                        <?= $fieldErr('phone') ?>
                    </div>

                    <fieldset class="sm:col-span-2">
                        <legend class="mb-2 text-sm font-bold text-ink-800">I need help with <span class="text-kumkum-600">*</span></legend>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($requirements as $k => $label): ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="requirement" value="<?= e($k) ?>" class="peer sr-only" <?= $old['requirement'] === $k ? 'checked' : '' ?> required>
                                    <span class="inline-block rounded-full border border-line bg-cream px-4 py-2 text-sm font-semibold text-ink-700 transition peer-checked:border-kumkum-700 peer-checked:bg-kumkum-700 peer-checked:text-cream peer-focus-visible:ring-2 peer-focus-visible:ring-kumkum-600 hover:border-ink-900/30"><?= e($label) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <?= $fieldErr('requirement') ?>
                    </fieldset>

                    <div>
                        <label for="f-location" class="mb-1.5 block text-sm font-bold text-ink-800">Location / area</label>
                        <input id="f-location" name="location" type="text" value="<?= e($old['location']) ?>" class="field" placeholder="e.g. Kusumkhera">
                    </div>
                    <div>
                        <label for="f-budget" class="mb-1.5 block text-sm font-bold text-ink-800">Approx. budget</label>
                        <select id="f-budget" name="budget" class="field">
                            <?php foreach (['' => 'Select (optional)', 'Under 15 Lakh' => 'Under ₹15 Lakh', '15-30 Lakh' => '₹15-30 Lakh', '30-60 Lakh' => '₹30-60 Lakh', '60 Lakh - 1 Cr' => '₹60 Lakh - 1 Cr', 'Above 1 Cr' => 'Above ₹1 Cr'] as $v => $l): ?>
                                <option value="<?= e($v) ?>" <?= $old['budget'] === $v ? 'selected' : '' ?>><?= e($l) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="f-message" class="mb-1.5 block text-sm font-bold text-ink-800">Anything else?</label>
                        <textarea id="f-message" name="message" rows="4" maxlength="1000" class="field resize-y<?= $errCls('message') ?>" placeholder="Plot size, number of floors, when you want to start…"><?= e($old['message']) ?></textarea>
                        <?= $fieldErr('message') ?>
                    </div>
                    <div class="flex flex-col gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
                        <p class="flex items-center gap-2 text-xs text-ink-500"><?= icon('shield', 'size-4 text-kumkum-700') ?> Your number is only used to call you back.</p>
                        <button type="submit" class="btn-primary text-base">Request a call back <?= icon('arrow', 'size-4') ?></button>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <!-- Office + map -->
        <div class="flex flex-col gap-5" data-reveal>
            <div class="overflow-hidden rounded-[2rem] border border-line bg-white">
                <iframe title="Office location map"
                        src="https://maps.google.com/maps?q=<?= rawurlencode($site['map_query']) ?>&z=14&output=embed"
                        class="h-72 w-full grayscale-[30%] lg:h-80" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="p-6 sm:p-8">
                    <p class="text-xs font-bold tracking-[0.2em] text-kumkum-700 uppercase">Office</p>
                    <p class="mt-2 font-display text-2xl font-bold text-ink-950"><?= e($site['office']) ?></p>
                    <p class="font-hindi text-ink-500"><?= e($site['office_hi']) ?></p>
                    <p class="mt-2 text-ink-600"><?= e($site['city']) ?>, <?= e($site['district']) ?>, <?= e($site['state']) ?></p>
                    <a href="https://www.google.com/maps/search/?api=1&query=<?= rawurlencode($site['map_query']) ?>" target="_blank" rel="noopener" class="btn-ghost mt-5"><?= icon('pin', 'size-4') ?> Get directions</a>
                </div>
            </div>
            <div class="rounded-[2rem] bg-ink-950 p-6 text-cream sm:p-8">
                <p class="font-hindi text-xl text-haldi-400"><?= e($site['promise_hi']) ?></p>
                <ul class="mt-4 space-y-3 text-sm text-cream/75">
                    <li class="flex gap-3"><?= icon('clock', 'size-5 shrink-0 text-haldi-400') ?> Office hours: Mon-Sat, 9:30 am - 7:00 pm</li>
                    <li class="flex gap-3"><?= icon('hardhat', 'size-5 shrink-0 text-haldi-400') ?> Site visits on Sundays by appointment</li>
                    <li class="flex gap-3"><?= icon('file', 'size-5 shrink-0 text-haldi-400') ?> Reg. No. <?= e($site['reg_no']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
