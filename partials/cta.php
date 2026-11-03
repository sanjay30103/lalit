<?php /** @var array $site */ ?>
<section class="py-20 sm:py-24">
    <div class="wrap">
        <div class="relative overflow-hidden rounded-[2rem] bg-kumkum-700 px-6 py-14 text-cream sm:px-12 lg:px-16" data-reveal>
            <div class="absolute inset-0 bg-blueprint-dark opacity-70" aria-hidden="true"></div>
            <!-- arch motif -->
            <div class="arch absolute -right-10 -bottom-24 hidden h-[26rem] w-80 border-[18px] border-haldi-400/25 lg:block" aria-hidden="true"></div>
            <div class="arch absolute right-24 -bottom-24 hidden h-72 w-52 border-[14px] border-cream/10 lg:block" aria-hidden="true"></div>

            <div class="relative max-w-2xl">
                <p class="font-hindi text-xl text-haldi-300">प्लॉट देखना है या घर बनवाना है?</p>
                <h2 class="mt-3 font-display text-4xl font-extrabold tracking-tight text-balance sm:text-5xl">Let's talk about your plot, your house, your plan.</h2>
                <p class="mt-5 max-w-lg text-cream/75">Call or WhatsApp us today. A free site visit and honest advice - that's how every project of ours begins.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <?php foreach ($site['phones'] as $i => $ph): ?>
                        <a href="<?= tel_link($ph) ?>" class="<?= $i === 0 ? 'btn-gold' : 'btn border border-cream/30 text-cream hover:bg-cream/10' ?> text-base"><?= icon('phone', 'size-4') ?> <?= e(fmt_phone($ph)) ?></a>
                    <?php endforeach; ?>
                    <a href="<?= e(wa_link('Namaste, mujhe free site visit chahiye.')) ?>" target="_blank" rel="noopener" class="btn-wa text-base"><?= icon('whatsapp', 'size-4') ?> WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</section>
