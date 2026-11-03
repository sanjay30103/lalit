<?php /** @var array $estimator */ ?>
<section id="estimate" class="relative overflow-hidden bg-ink-950 py-20 text-cream sm:py-24">
    <div class="absolute inset-0 bg-blueprint-dark" aria-hidden="true"></div>
    <div class="absolute -top-32 -right-32 size-96 rounded-full bg-kumkum-700/30 blur-3xl" aria-hidden="true"></div>

    <div class="wrap relative grid gap-12 lg:grid-cols-[1fr_1.15fr] lg:items-center">
        <div data-reveal>
            <span class="eyebrow text-haldi-400!">Cost calculator</span>
            <h2 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-balance sm:text-5xl">
                What will your house cost? <span class="text-haldi-400">Find out in 10 seconds.</span>
            </h2>
            <p class="mt-3 font-hindi text-xl text-cream/70">मकान बनाने में कितना ख़र्च आएगा - अभी जानें</p>
            <p class="mt-6 max-w-md leading-relaxed text-cream/65">
                Move the sliders to get an indicative budget for building in Haldwani. For an exact, item-wise estimate we visit your site - free of charge.
            </p>
            <ul class="mt-8 space-y-3 text-sm text-cream/75">
                <li class="flex gap-3"><?= icon('check', 'size-5 shrink-0 text-haldi-400') ?> Rates include material + labour (turnkey)</li>
                <li class="flex gap-3"><?= icon('check', 'size-5 shrink-0 text-haldi-400') ?> Naksha pass fees & land cost not included</li>
                <li class="flex gap-3"><?= icon('check', 'size-5 shrink-0 text-haldi-400') ?> Send your numbers to us on WhatsApp in one tap</li>
            </ul>
        </div>

        <form id="estimator" class="rounded-3xl border border-white/10 bg-ink-900/80 p-6 shadow-2xl backdrop-blur sm:p-8" data-reveal
              data-tiers='<?= e(json_encode(array_map(fn($t) => $t['rate'], $estimator['tiers']))) ?>'
              data-spread="<?= e((string) $estimator['spread']) ?>"
              onsubmit="return false">
            <div>
                <div class="flex items-baseline justify-between">
                    <label for="est-area" class="text-sm font-semibold text-cream/80">Built-up area per floor</label>
                    <output id="est-area-out" class="font-display text-2xl font-bold text-haldi-400">1,000 <span class="text-sm text-cream/50">sq.ft</span></output>
                </div>
                <input id="est-area" type="range" min="400" max="4000" step="50" value="1000" class="range mt-4">
                <div class="mt-2 flex justify-between text-[11px] text-cream/40"><span>400</span><span>4,000 sq.ft</span></div>
            </div>

            <fieldset class="mt-8">
                <legend class="text-sm font-semibold text-cream/80">Number of floors</legend>
                <div class="mt-3 grid grid-cols-4 gap-2">
                    <?php foreach ([1 => 'G', 2 => 'G+1', 3 => 'G+2', 4 => 'G+3'] as $n => $lbl): ?>
                        <label class="cursor-pointer">
                            <input type="radio" name="floors" value="<?= $n ?>" class="peer sr-only" <?= $n === 2 ? 'checked' : '' ?>>
                            <span class="block rounded-xl border border-white/10 py-3 text-center text-sm font-bold text-cream/70 transition peer-checked:border-haldi-400 peer-checked:bg-haldi-400 peer-checked:text-ink-950 peer-focus-visible:ring-2 peer-focus-visible:ring-haldi-400 hover:border-white/30"><?= $lbl ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <fieldset class="mt-8">
                <legend class="text-sm font-semibold text-cream/80">Finish quality</legend>
                <div class="mt-3 grid gap-2 sm:grid-cols-3">
                    <?php foreach ($estimator['tiers'] as $key => $t): ?>
                        <label class="cursor-pointer">
                            <input type="radio" name="tier" value="<?= e($key) ?>" class="peer sr-only" <?= $key === 'premium' ? 'checked' : '' ?>>
                            <span class="block h-full rounded-xl border border-white/10 p-3 transition peer-checked:border-haldi-400 peer-checked:bg-white/5 peer-focus-visible:ring-2 peer-focus-visible:ring-haldi-400 hover:border-white/30">
                                <span class="flex items-center justify-between text-sm font-bold text-cream"><?= e($t['label']) ?> <span class="font-hindi text-xs font-normal text-cream/50"><?= e($t['hi']) ?></span></span>
                                <span class="mt-1 block text-[11px] leading-snug text-cream/50"><?= e($t['note']) ?></span>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <div class="mt-8 rounded-2xl bg-cream p-5 text-ink-950 sm:p-6">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <p class="text-xs font-bold tracking-[0.18em] text-kumkum-700 uppercase">Estimated budget</p>
                        <p id="est-total" class="mt-1 font-display text-3xl font-extrabold tracking-tight sm:text-4xl" aria-live="polite">₹ 41 - 47 Lakh</p>
                    </div>
                    <div class="text-right text-xs text-ink-600">
                        <p><span id="est-sqft">2,000</span> sq.ft total</p>
                        <p>@ ₹<span id="est-rate">2,150</span>/sq.ft approx.</p>
                    </div>
                </div>
                <div class="mt-4 flex h-2 overflow-hidden rounded-full" aria-hidden="true">
                    <span class="w-[55%] bg-kumkum-700"></span><span class="w-[30%] bg-haldi-400"></span><span class="w-[15%] bg-ink-700"></span>
                </div>
                <div class="mt-2 flex flex-wrap gap-x-4 gap-y-1 text-[11px] text-ink-600">
                    <span class="flex items-center gap-1.5"><i class="size-2 rounded-full bg-kumkum-700"></i>Structure ~55%</span>
                    <span class="flex items-center gap-1.5"><i class="size-2 rounded-full bg-haldi-400"></i>Finishing ~30%</span>
                    <span class="flex items-center gap-1.5"><i class="size-2 rounded-full bg-ink-700"></i>Electrical & plumbing ~15%</span>
                </div>
                <a id="est-wa" href="<?= e(wa_link()) ?>" target="_blank" rel="noopener" class="btn-wa mt-5 w-full">
                    <?= icon('whatsapp', 'size-4') ?> Get exact quote on WhatsApp
                </a>
            </div>
            <p class="mt-4 text-center text-[11px] text-cream/40">Indicative only. Final cost depends on soil, design and material choice.</p>
        </form>
    </div>
</section>
