<?php /** @var array $site @var array $nav @var array $services */ ?>
</main>

<footer class="relative overflow-hidden bg-ink-950 text-cream/80">
    <div class="absolute inset-0 bg-blueprint-dark opacity-60" aria-hidden="true"></div>
    <div class="wrap relative">
        <!-- Big sign-off -->
        <div class="flex flex-col gap-6 border-b border-white/10 py-14 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="font-hindi text-2xl text-haldi-400 sm:text-3xl"><?= e($site['tagline_hi']) ?></p>
                <p class="mt-2 max-w-md text-cream/60"><?= e($site['promise_hi']) ?> - plots, construction and ready homes in Haldwani.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="<?= tel_link($site['phones'][0]) ?>" class="btn-gold"><?= icon('phone', 'size-4') ?> Call now</a>
                <a href="<?= e(wa_link('Namaste, mujhe aapki services ke baare me jaankari chahiye.')) ?>" target="_blank" rel="noopener" class="btn-wa"><?= icon('whatsapp', 'size-4') ?> WhatsApp</a>
            </div>
        </div>

        <div class="grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1.3fr]">
            <div>
                <a href="./" class="flex items-center gap-3">
                    <?= logo_mark('size-12', true) ?>
                    <span class="leading-none">
                        <span class="block font-display text-xl font-extrabold text-cream">Guru Gorakhnath</span>
                        <span class="mt-1 block text-[10px] font-bold tracking-[0.28em] text-haldi-400">CONSTRUCTION</span>
                    </span>
                </a>
                <p class="mt-5 max-w-xs text-sm leading-relaxed text-cream/60">
                    All types of building construction, plus sale and purchase of plots and other properties - led personally by <?= e($site['owner']) ?>.
                </p>
                <p class="mt-4 inline-flex rounded-lg border border-white/10 px-3 py-2 font-mono text-xs text-cream/70">Reg. No. <?= e($site['reg_no']) ?></p>
            </div>

            <div>
                <h3 class="text-xs font-bold tracking-[0.2em] text-haldi-400 uppercase">Explore</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <?php foreach ($nav as $slug => $label): ?>
                        <li><a href="<?= page_url($slug) ?>" class="transition hover:text-cream"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold tracking-[0.2em] text-haldi-400 uppercase">Services</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <?php foreach ($services as $s): ?>
                        <li><a href="services.php#<?= e($s['slug']) ?>" class="transition hover:text-cream"><?= e($s['title']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold tracking-[0.2em] text-haldi-400 uppercase">Visit / Call</h3>
                <ul class="mt-5 space-y-4 text-sm">
                    <li class="flex gap-3"><?= icon('pin', 'mt-0.5 size-4 shrink-0 text-haldi-400') ?>
                        <span><?= e($site['office']) ?>,<br><?= e($site['city']) ?>, <?= e($site['district']) ?> (<?= e($site['state']) ?>)</span></li>
                    <?php foreach ($site['phones'] as $ph): ?>
                        <li><a href="<?= tel_link($ph) ?>" class="flex gap-3 transition hover:text-cream"><?= icon('phone', 'size-4 shrink-0 text-haldi-400') ?> <?= e(fmt_phone($ph)) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?= e(wa_link()) ?>" target="_blank" rel="noopener" class="flex gap-3 transition hover:text-cream"><?= icon('whatsapp', 'size-4 shrink-0 text-haldi-400') ?> <?= e(fmt_phone($site['whatsapp'])) ?></a></li>
                    <li><a href="mailto:<?= e(strtolower($site['email'])) ?>" class="flex gap-3 break-all transition hover:text-cream"><?= icon('mail', 'size-4 shrink-0 text-haldi-400') ?> <?= e(strtolower($site['email'])) ?></a></li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col gap-2 border-t border-white/10 py-6 text-xs text-cream/45 sm:flex-row sm:justify-between">
            <p>© <?= date('Y') ?> <?= e($site['name']) ?>, <?= e($site['city']) ?>. All rights reserved.</p>
            <p class="flex gap-4"><a href="credits.php" class="hover:text-cream">Photo credits</a><a href="brand.php" class="hover:text-cream">Brand kit</a></p>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp (desktop) -->
<a href="<?= e(wa_link('Namaste, mujhe jaankari chahiye.')) ?>" target="_blank" rel="noopener"
   class="group fixed right-5 bottom-5 z-40 hidden items-center gap-3 rounded-full bg-[#1faa53] py-3 pr-5 pl-3 text-white shadow-xl shadow-black/20 transition hover:bg-[#178c44] lg:inline-flex" aria-label="Chat on WhatsApp">
    <span class="relative flex size-9 items-center justify-center rounded-full bg-white/15">
        <span class="absolute inset-0 animate-ping rounded-full bg-white/20"></span>
        <?= icon('whatsapp', 'relative size-5') ?>
    </span>
    <span class="text-sm font-bold">Chat with us</span>
</a>

<!-- Mobile action bar -->
<div class="fixed inset-x-0 bottom-0 z-40 grid grid-cols-3 border-t border-line bg-cream/95 backdrop-blur lg:hidden">
    <a href="<?= tel_link($site['phones'][0]) ?>" class="flex flex-col items-center gap-1 py-2.5 text-[11px] font-bold text-ink-900"><?= icon('phone', 'size-5 text-kumkum-700') ?>Call</a>
    <a href="<?= e(wa_link('Namaste, mujhe jaankari chahiye.')) ?>" target="_blank" rel="noopener" class="flex flex-col items-center gap-1 bg-[#1faa53] py-2.5 text-[11px] font-bold text-white"><?= icon('whatsapp', 'size-5') ?>WhatsApp</a>
    <a href="contact.php#enquiry" class="flex flex-col items-center gap-1 py-2.5 text-[11px] font-bold text-ink-900"><?= icon('mail', 'size-5 text-kumkum-700') ?>Enquiry</a>
</div>

<script src="<?= asset('assets/js/main.js') ?>" defer></script>
</body>
</html>
