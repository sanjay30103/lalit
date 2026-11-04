/* Guru Gorakhnath Construction - site scripts (vanilla, no dependencies) */
(() => {
  'use strict';

  const $ = (s, el = document) => el.querySelector(s);
  const $$ = (s, el = document) => [...el.querySelectorAll(s)];
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Header: shadow on scroll ---------- */
  const header = $('#site-header');
  const onScroll = () => {
    const scrolled = window.scrollY > 8;
    header?.classList.toggle('shadow-[0_8px_30px_-12px_rgb(31_26_24/0.18)]', scrolled);
    header?.classList.toggle('border-line', scrolled);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- Mobile menu ---------- */
  const menuBtn = $('#menu-btn');
  const menu = $('#mobile-menu');
  menuBtn?.addEventListener('click', () => {
    const open = menu.classList.toggle('hidden') === false;
    menuBtn.setAttribute('aria-expanded', String(open));
    menuBtn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    $('[data-open]', menuBtn).classList.toggle('hidden', open);
    $('[data-close]', menuBtn).classList.toggle('hidden', !open);
  });

  /* ---------- Reveal on scroll ---------- */
  const revealEls = $$('[data-reveal]');
  if ('IntersectionObserver' in window && !reduceMotion) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((en) => {
        if (en.isIntersecting) {
          en.target.classList.add('is-visible');
          io.unobserve(en.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    revealEls.forEach((el) => io.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  }

  /* ---------- Count-up numbers ---------- */
  const counters = $$('[data-count]');
  const runCount = (el) => {
    const end = parseInt(el.dataset.count, 10) || 0;
    if (reduceMotion || end <= 1) { el.textContent = end; return; }
    const dur = 1400; const t0 = performance.now();
    const step = (t) => {
      const p = Math.min(1, (t - t0) / dur);
      el.textContent = Math.round(end * (1 - Math.pow(1 - p, 3)));
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };
  if ('IntersectionObserver' in window) {
    const cio = new IntersectionObserver((entries) => {
      entries.forEach((en) => { if (en.isIntersecting) { runCount(en.target); cio.unobserve(en.target); } });
    }, { threshold: 0.6 });
    counters.forEach((c) => cio.observe(c));
  } else counters.forEach(runCount);

  /* ---------- Filters (chips + optional search/location) ---------- */
  const ACTIVE = ['is-active', 'border-ink-900', 'bg-ink-900', 'text-cream'];
  const INACTIVE = ['border-line', 'bg-white', 'text-ink-700'];

  $$('[data-filter-group]').forEach((group) => {
    const name = group.dataset.filterGroup;
    const target = $(`[data-filter-target="${name}"]`);
    if (!target) return;
    const items = $$(':scope > [data-type]', target);
    const search = name === 'props' ? $('#prop-search') : null;
    const location = name === 'props' ? $('#prop-location') : null;
    const countEl = name === 'props' ? $('#prop-count') : null;
    const emptyEl = name === 'props' ? $('#prop-empty') : null;
    const urlType = name === 'props' ? new URLSearchParams(window.location.search).get("type") : null;
    let type = urlType || target.dataset.initial || 'all';

    const apply = () => {
      const q = (search?.value || '').trim().toLowerCase();
      const loc = location?.value || 'all';
      let shown = 0;
      items.forEach((it) => {
        const ok = (type === 'all' || it.dataset.type === type)
          && (loc === 'all' || it.dataset.location === loc)
          && (!q || (it.dataset.search || '').includes(q));
        it.classList.toggle('hidden', !ok);
        if (ok) shown++;
      });
      if (countEl) countEl.textContent = shown;
      emptyEl?.classList.toggle('hidden', shown > 0);
      $$('[data-filter]', group).forEach((b) => {
        const on = b.dataset.filter === type;
        b.classList.remove(...(on ? INACTIVE : ACTIVE));
        b.classList.add(...(on ? ACTIVE : INACTIVE));
        b.setAttribute('aria-pressed', String(on));
      });
    };

    group.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-filter]');
      if (!btn) return;
      type = btn.dataset.filter;
      apply();
    });
    search?.addEventListener('input', apply);
    location?.addEventListener('change', apply);
    apply();
  });

  /* ---------- Cost estimator ---------- */
  const est = $('#estimator');
  if (est) {
    const rates = JSON.parse(est.dataset.tiers);
    const spread = parseFloat(est.dataset.spread) || 0.07;
    const area = $('#est-area');
    const inr = new Intl.NumberFormat('en-IN');

    const fmtMoney = (v) => {
      if (v >= 1e7) return (v / 1e7).toFixed(2).replace(/\.?0+$/, '') + ' Cr';
      return Math.round(v / 1e5) + ' Lakh';
    };

    const calc = () => {
      const a = parseInt(area.value, 10);
      const floors = parseInt($('input[name="floors"]:checked', est).value, 10);
      const tier = $('input[name="tier"]:checked', est).value;
      const rate = rates[tier];
      const total = a * floors;
      const mid = total * rate;
      const lo = mid * (1 - spread), hi = mid * (1 + spread);

      // fill slider track
      const pct = ((a - area.min) / (area.max - area.min)) * 100;
      area.style.background = `linear-gradient(to right, #f0b429 ${pct}%, rgb(250 246 239 / .15) ${pct}%)`;

      $('#est-area-out').innerHTML = `${inr.format(a)} <span class="text-sm text-cream/50">sq.ft</span>`;
      $('#est-sqft').textContent = inr.format(total);
      $('#est-rate').textContent = inr.format(rate);
      const loTxt = fmtMoney(lo), hiTxt = fmtMoney(hi);
      const sameUnit = loTxt.split(' ')[1] === hiTxt.split(' ')[1];
      $('#est-total').textContent = sameUnit
        ? `₹ ${loTxt.split(' ')[0]} - ${hiTxt}`
        : `₹ ${loTxt} - ${hiTxt}`;

      const floorsLbl = ['G', 'G+1', 'G+2', 'G+3'][floors - 1];
      const msg = `Namaste, mujhe ghar banwane ka estimate chahiye:\n• Area: ${inr.format(a)} sq.ft per floor (${floorsLbl})\n• Total: ${inr.format(total)} sq.ft\n• Finish: ${tier}\n• Website estimate: ${$('#est-total').textContent}`;
      const wa = $('#est-wa');
      const base = wa.href.split('?')[0];
      wa.href = `${base}?text=${encodeURIComponent(msg)}`;
    };

    est.addEventListener('input', calc);
    est.addEventListener('change', calc);
    calc();
  }

  /* ---------- Static hosting: send enquiry form via WhatsApp ---------- */
  const waForm = $('form[data-wa-form]');
  if (waForm) {
    const params = new URLSearchParams(location.search);
    const prop = params.get('property');
    if (prop) {
      const msg = $('#f-message', waForm);
      if (msg && !msg.value) msg.value = `I'm interested in property ${prop}.`;
    }
    waForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const fd = new FormData(waForm);
      const name = (fd.get('name') || '').toString().trim();
      const phone = (fd.get('phone') || '').toString().replace(/\D/g, '').slice(-10);
      const need = $('input[name="requirement"]:checked', waForm);
      const errs = [];
      if (name.length < 2) errs.push('Please enter your name.');
      if (!/^[6-9]\d{9}$/.test(phone)) errs.push('Please enter a valid 10-digit mobile number.');
      if (!need) errs.push('Please choose what you need.');
      if (errs.length) { alert(errs.join('\n')); return; }
      const label = need.nextElementSibling.textContent.trim();
      const lines = [
        'Namaste, website se enquiry:',
        `Naam: ${name}`,
        `Mobile: ${phone}`,
        `Requirement: ${label}`,
        fd.get('location') ? `Location: ${fd.get('location')}` : '',
        fd.get('budget') ? `Budget: ${fd.get('budget')}` : '',
        fd.get('message') ? `Note: ${fd.get('message')}` : '',
      ].filter(Boolean);
      window.open(`${waForm.dataset.waForm}?text=${encodeURIComponent(lines.join('\n'))}`, '_blank', 'noopener');
    });
  }

  /* ---------- Lightbox ---------- */
  const lb = $('#lightbox');
  if (lb && typeof lb.showModal === 'function') {
    const img = $('#lightbox-img');
    const cap = $('#lightbox-cap');
    document.addEventListener('click', (e) => {
      const t = e.target.closest('[data-lightbox]');
      if (!t) return;
      img.src = t.dataset.lightbox;
      img.alt = t.dataset.caption || '';
      cap.textContent = t.dataset.caption || '';
      lb.showModal();
    });
    lb.addEventListener('click', (e) => { if (e.target === lb) lb.close(); });
  }
})();
