<?php /** @var array $faqs */ ?>
<section class="py-20 sm:py-24">
    <div class="wrap grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
        <div data-reveal>
            <span class="eyebrow">Questions</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance text-ink-950 sm:text-5xl">Things people ask us before they start.</h2>
            <p class="mt-3 font-hindi text-xl text-ink-500">अक्सर पूछे जाने वाले सवाल</p>
            <a href="contact.php" class="btn-ghost mt-8">Ask your own question <?= icon('arrow', 'size-4') ?></a>
        </div>
        <div class="divide-y divide-line border-y border-line" data-reveal>
            <?php foreach ($faqs as $i => $f): ?>
                <details class="group py-2" <?= $i === 0 ? 'open' : '' ?>>
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-4 text-left font-display text-lg font-bold text-ink-950 sm:text-xl">
                        <?= e($f['q']) ?>
                        <span class="faq-icon flex size-9 shrink-0 items-center justify-center rounded-full border border-line text-kumkum-700 transition duration-300 group-open:bg-kumkum-700 group-open:text-cream"><?= icon('plus', 'size-4') ?></span>
                    </summary>
                    <p class="max-w-2xl pr-12 pb-5 leading-relaxed text-ink-600"><?= e($f['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
