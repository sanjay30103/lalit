<?php
/** @var array $p  one property from $properties  @var array $propertyTypes */
$type = $propertyTypes[$p['type']];
$badge = [
    'plot'    => 'bg-haldi-400 text-ink-950',
    'house'   => 'bg-kumkum-700 text-cream',
    'ongoing' => 'bg-ink-900 text-cream',
][$p['type']];
$waMsg = "Namaste, mujhe is property ke baare me jaankari chahiye:\n{$p['title']} ({$p['id']})\n{$p['location']}, Haldwani - {$p['area']}";
?>
<article class="property group flex flex-col overflow-hidden rounded-3xl border border-line bg-white transition duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-ink-900/10"
         data-type="<?= e($p['type']) ?>" data-location="<?= e($p['location']) ?>" data-search="<?= e(strtolower($p['title'] . ' ' . $p['location'] . ' ' . implode(' ', $p['tags']))) ?>">
    <div class="relative aspect-[4/3] overflow-hidden">
        <img src="<?= img($p['image']) ?>" alt="<?= e($p['title']) ?>" loading="lazy" class="size-full object-cover transition duration-700 group-hover:scale-105">
        <span class="absolute top-4 left-4 rounded-full px-3 py-1 text-xs font-bold <?= $badge ?>"><?= e($type['label']) ?></span>
        <span class="absolute top-4 right-4 rounded-full bg-white/90 px-2.5 py-1 font-mono text-[10px] font-bold text-ink-700"><?= e($p['id']) ?></span>
    </div>
    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <p class="flex items-center gap-1.5 text-xs font-semibold text-kumkum-700"><?= icon('pin', 'size-3.5') ?> <?= e($p['location']) ?>, Haldwani</p>
        <h3 class="mt-2 font-display text-xl leading-snug font-bold text-ink-950"><?= e($p['title']) ?></h3>
        <dl class="mt-4 grid grid-cols-2 gap-3 border-y border-line py-4 text-sm">
            <div class="flex items-center gap-2"><?= icon('area', 'size-4 text-ink-500') ?><dt class="sr-only">Area</dt><dd class="font-semibold"><?= e($p['area']) ?></dd></div>
            <div class="flex items-center gap-2"><?= icon('compass', 'size-4 text-ink-500') ?><dt class="sr-only">Facing</dt><dd class="font-semibold"><?= e($p['facing']) ?> facing</dd></div>
        </dl>
        <ul class="mt-4 flex flex-wrap gap-1.5">
            <?php foreach ($p['tags'] as $t): ?>
                <li class="rounded-full bg-sand px-2.5 py-1 text-[11px] font-semibold text-ink-700"><?= e($t) ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-auto flex items-end justify-between gap-3 pt-5">
            <div>
                <p class="text-[11px] font-semibold text-ink-500 uppercase">Price</p>
                <p class="font-display text-2xl font-extrabold text-ink-950"><?= e($p['price']) ?></p>
            </div>
            <div class="flex gap-2">
                <a href="<?= e(wa_link($waMsg)) ?>" target="_blank" rel="noopener" class="inline-flex size-11 items-center justify-center rounded-full bg-[#1faa53] text-white transition hover:bg-[#178c44]" aria-label="Enquire on WhatsApp about <?= e($p['title']) ?>"><?= icon('whatsapp', 'size-5') ?></a>
                <a href="contact.php?property=<?= e($p['id']) ?>#enquiry" class="inline-flex size-11 items-center justify-center rounded-full bg-ink-900 text-cream transition hover:bg-kumkum-700" aria-label="Send enquiry about <?= e($p['title']) ?>"><?= icon('arrow-ur', 'size-5') ?></a>
            </div>
        </div>
    </div>
</article>
