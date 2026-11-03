<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

date_default_timezone_set('Asia/Kolkata');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/** HTML-escape */
function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

function tel_link(string $n): string
{
    return 'tel:+91' . preg_replace('/\D/', '', $n);
}

function fmt_phone(string $n): string
{
    $n = preg_replace('/\D/', '', $n);
    return '+91 ' . substr($n, 0, 5) . ' ' . substr($n, 5);
}

function wa_link(string $message = ''): string
{
    global $site;
    $url = 'https://wa.me/91' . $site['whatsapp'];
    return $message !== '' ? $url . '?text=' . rawurlencode($message) : $url;
}

function img(string $file): string
{
    return 'assets/images/site/' . $file;
}

/** Cache-busted asset URL */
function asset(string $path): string
{
    $full = __DIR__ . '/../' . $path;
    return $path . (is_file($full) ? '?v=' . filemtime($full) : '');
}

function current_page(): string
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php', '.php');
}

/** True when rendering the static (GitHub Pages) copy: STATIC_EXPORT=1 php -S ... */
function is_static(): bool
{
    return getenv('STATIC_EXPORT') === '1';
}

function page_url(string $slug): string
{
    return $slug === 'index' ? './' : $slug . '.php';
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}

/** Brand mark (inline SVG). $light = for dark backgrounds */
function logo_mark(string $class = 'size-11', bool $light = false): string
{
    $body = $light ? '#FAF6EF' : '#1F1A18';
    $roof = $light ? '#D9574B' : '#9A2820';
    return '<svg class="' . e($class) . '" viewBox="0 0 64 64" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">'
        . '<path d="M23 31a9 9 0 0 1 18 0z" fill="#F0B429"/>'
        . '<path d="M32 19.5v-2.5M40.1 22.9l1.8-1.8M23.9 22.9l-1.8-1.8" stroke="#F0B429" stroke-width="2.4" stroke-linecap="round"/>'
        . '<path d="M6 31 32 9l26 22" fill="none" stroke="' . $roof . '" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>'
        . '<path d="M14 28v19a8 8 0 0 0 8 8h20a8 8 0 0 0 8-8v-7H36" fill="none" stroke="' . $body . '" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>'
        . '</svg>';
}

/** Line icons (Lucide-style, 24px grid) */
function icon(string $name, string $class = 'size-5'): string
{
    static $paths = [
        'phone'    => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'mail'     => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'pin'      => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'arrow'    => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'arrow-ur' => '<path d="M7 17 17 7"/><path d="M7 7h10v10"/>',
        'check'    => '<path d="M20 6 9 17l-5-5"/>',
        'home'     => '<path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/>',
        'key'      => '<circle cx="7.5" cy="15.5" r="5.5"/><path d="m21 2-9.6 9.6"/><path d="m15.5 7.5 3 3L22 7l-3-3"/>',
        'file'     => '<path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><path d="M14 2v6h6"/><path d="m9 15 2 2 4-4"/>',
        'shield'   => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
        'clock'    => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'users'    => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'area'     => '<path d="M8 3H5a2 2 0 0 0-2 2v3"/><path d="M21 8V5a2 2 0 0 0-2-2h-3"/><path d="M3 16v3a2 2 0 0 0 2 2h3"/><path d="M16 21h3a2 2 0 0 0 2-2v-3"/>',
        'compass'  => '<circle cx="12" cy="12" r="10"/><path d="m16.24 7.76-2.12 6.36-6.36 2.12 2.12-6.36 6.36-2.12z"/>',
        'menu'     => '<path d="M4 7h16M4 12h16M4 17h10"/>',
        'x'        => '<path d="M18 6 6 18M6 6l12 12"/>',
        'calc'     => '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M8 6h8M16 14v4M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01"/>',
        'building' => '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M16 6h.01M12 6h.01M12 10h.01M12 14h.01M16 10h.01M16 14h.01M8 10h.01M8 14h.01"/>',
        'hardhat'  => '<path d="M2 18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v2z"/><path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5"/><path d="M4 15v-3a6 6 0 0 1 6-6"/><path d="M14 6a6 6 0 0 1 6 6v3"/>',
        'map'      => '<path d="M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"/><path d="M15 5.764v15M9 3.236v15"/>',
        'chevron'  => '<path d="m6 9 6 6 6-6"/>',
        'plus'     => '<path d="M12 5v14M5 12h14"/>',
        'layers'   => '<path d="m12 2 10 5-10 5L2 7z"/><path d="m2 17 10 5 10-5"/><path d="m2 12 10 5 10-5"/>',
        'wrench'   => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'search'   => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'expand'   => '<path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>',
        'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>',
        'quote'    => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>',
    ];

    if ($name === 'whatsapp') {
        return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>';
    }

    $p = $paths[$name] ?? $paths['home'];
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $p . '</svg>';
}

/** Small page hero used on inner pages */
function page_hero(string $eyebrow, string $title, string $hi, string $lead, string $image): void
{
    ?>
    <section class="relative overflow-hidden border-b border-line bg-blueprint">
        <div class="wrap grid items-center gap-10 py-14 md:grid-cols-[1.2fr_1fr] md:py-20">
            <div data-reveal>
                <nav class="mb-6 flex items-center gap-2 text-xs font-semibold text-ink-500" aria-label="Breadcrumb">
                    <a href="./" class="hover:text-kumkum-700">Home</a><span>/</span><span class="text-ink-900"><?= e($eyebrow) ?></span>
                </nav>
                <p class="font-hindi text-xl text-kumkum-700"><?= e($hi) ?></p>
                <h1 class="mt-2 font-display text-4xl leading-[1.05] font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl lg:text-6xl"><?= $title ?></h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-ink-600"><?= e($lead) ?></p>
            </div>
            <div class="relative mx-auto hidden w-full max-w-sm md:block" data-reveal>
                <div class="arch aspect-[4/5] overflow-hidden border-8 border-white shadow-2xl shadow-ink-900/15">
                    <img src="<?= img($image) ?>" alt="" class="size-full object-cover">
                </div>
                <div class="absolute -bottom-4 -left-6 rounded-2xl bg-haldi-400 px-4 py-3 font-hindi text-ink-950 shadow-lg">
                    <?= e($GLOBALS['site']['tagline_hi']) ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
