<?php
/** @var array $site @var array $nav */
$pageTitle = $pageTitle ?? $site['name'] . ' - Plots, House Construction & Ready Homes in Haldwani';
$pageDesc  = $pageDesc ?? 'Guru Gorakhnath Construction, Kusumkhera, Haldwani - buy or sell plots, get your house built from naksha pass to handover, or buy a ready-to-move home. Call ' . $site['phones'][0] . '.';
$active    = current_page();

$schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'GeneralContractor',
    'name'       => $site['name'],
    'alternateName' => $site['name_hi'],
    'founder'    => ['@type' => 'Person', 'name' => $site['owner']],
    'telephone'  => '+91' . $site['phones'][0],
    'email'      => $site['email'],
    'address'    => [
        '@type' => 'PostalAddress',
        'streetAddress'   => $site['office'],
        'addressLocality' => $site['city'],
        'addressRegion'   => $site['state'],
        'addressCountry'  => 'IN',
    ],
    'areaServed' => ['Haldwani', 'Kathgodam', 'Lalkuan', 'Nainital district'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script>document.documentElement.classList.add('js')</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDesc) ?>">
    <meta name="theme-color" content="#9A2820">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDesc) ?>">
    <meta property="og:image" content="<?= e($site['base_url']) ?>/assets/images/demo/villa-modern-1.jpg">
    <link rel="icon" type="image/svg+xml" href="assets/brand/favicon.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500..800&family=Manrope:wght@400..800&family=Mukta:wght@400;600;700&family=Tiro+Devanagari+Hindi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">

    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body class="min-h-screen pb-16 lg:pb-0">

<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[100] focus:rounded-lg focus:bg-ink-900 focus:px-4 focus:py-2 focus:text-cream">Skip to content</a>

<header id="site-header" class="sticky top-0 z-50 border-b border-transparent bg-cream/85 backdrop-blur-lg transition-[border-color,box-shadow] duration-300">
    <div class="wrap flex h-18 items-center justify-between gap-4">
        <a href="./" class="flex items-center gap-3" aria-label="<?= e($site['name']) ?> - Home">
            <?= logo_mark('size-11 shrink-0') ?>
            <span class="leading-none">
                <span class="block font-display text-lg font-extrabold tracking-tight text-ink-950 sm:text-xl">Guru Gorakhnath</span>
                <span class="mt-1 block text-[10px] font-bold tracking-[0.28em] text-kumkum-700">CONSTRUCTION</span>
            </span>
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="Main">
            <?php foreach ($nav as $slug => $label): $isActive = $active === $slug; ?>
                <a href="<?= page_url($slug) ?>"
                   class="relative rounded-full px-4 py-2 text-sm font-semibold transition <?= $isActive ? 'text-kumkum-700' : 'text-ink-700 hover:text-ink-950' ?>"
                   <?= $isActive ? 'aria-current="page"' : '' ?>>
                    <?= e($label) ?>
                    <?php if ($isActive): ?><span class="absolute inset-x-4 -bottom-0.5 h-0.5 rounded-full bg-haldi-400"></span><?php endif; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="flex items-center gap-2">
            <a href="<?= tel_link($site['phones'][0]) ?>" class="hidden items-center gap-2 rounded-full border border-ink-900/10 bg-white px-4 py-2.5 text-sm font-bold text-ink-900 transition hover:border-kumkum-700/40 md:inline-flex">
                <?= icon('phone', 'size-4 text-kumkum-700') ?> <?= e(fmt_phone($site['phones'][0])) ?>
            </a>
            <a href="<?= e(wa_link('Namaste, mujhe Guru Gorakhnath Construction se jaankari chahiye.')) ?>" target="_blank" rel="noopener" class="hidden size-11 items-center justify-center rounded-full bg-[#1faa53] text-white transition hover:bg-[#178c44] sm:inline-flex" aria-label="WhatsApp">
                <?= icon('whatsapp', 'size-5') ?>
            </a>
            <button type="button" id="menu-btn" class="inline-flex size-11 items-center justify-center rounded-full bg-ink-900 text-cream lg:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
                <span data-open><?= icon('menu', 'size-5') ?></span>
                <span data-close class="hidden"><?= icon('x', 'size-5') ?></span>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden border-t border-line bg-cream lg:hidden">
        <nav class="wrap flex flex-col py-4" aria-label="Mobile">
            <?php foreach ($nav as $slug => $label): ?>
                <a href="<?= page_url($slug) ?>" class="flex items-center justify-between border-b border-line/70 py-3.5 text-base font-semibold <?= $active === $slug ? 'text-kumkum-700' : 'text-ink-900' ?>">
                    <?= e($label) ?> <?= icon('arrow', 'size-4 opacity-40') ?>
                </a>
            <?php endforeach; ?>
            <div class="mt-5 grid gap-2">
                <?php foreach ($site['phones'] as $ph): ?>
                    <a href="<?= tel_link($ph) ?>" class="btn-ghost justify-start"><?= icon('phone', 'size-4 text-kumkum-700') ?> <?= e(fmt_phone($ph)) ?></a>
                <?php endforeach; ?>
            </div>
        </nav>
    </div>
</header>

<main id="main">
