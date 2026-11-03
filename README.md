# Guru Gorakhnath Construction - Website

PHP + Tailwind CSS v4 website for **Guru Gorakhnath Construction**, Kusumkhera, Haldwani.

## Chalane ka tarika (local)

```bash
npm install          # sirf pehli baar
npm run build        # Tailwind CSS compile -> assets/css/style.css
npm run serve        # http://localhost:8000
```

Design par kaam karte waqt `npm run dev` chalayein (CSS auto-rebuild).

## Kahan kya badlein

| Kya badalna hai | File |
|---|---|
| Phone, email, address, Reg. No. | `includes/config.php` → `$site` |
| Plots / makaan listings | `includes/config.php` → `$properties` |
| Kaam ki photos (gallery) | `includes/config.php` → `$projects` + images `assets/images/demo/` |
| Cost calculator rates (₹/sq.ft) | `includes/config.php` → `$estimator` |
| Stats (10+ years etc.) | `includes/config.php` → `$stats` - **client se confirm karein** |
| FAQ, services, steps | `includes/config.php` |
| Colours / fonts | `src/input.css` → `@theme` (phir `npm run build`) |
| Logo files | `assets/brand/` (preview: `/brand.php`) |

## Pages
`index.php` Home · `services.php` · `properties.php` (filter + search) · `projects.php` (gallery + lightbox) · `about.php` · `contact.php` (enquiry form) · `brand.php` (logo kit)

## Contact form
Enquiries `storage/enquiries.csv` me save hoti hain (Excel me khul jaati hai) aur server par `mail()` chalu ho to email par bhi aati hain. `storage/` folder web se blocked hai (`.htaccess`).

## Live karne se pehle
- Demo images (`assets/images/demo/`) ko client ke asli kaam ki photos se badlein.
- Demo listings, prices aur stats ko asli data se badlein.
- `config.php` me `base_url` set karein.
- Hosting par upload karte waqt `node_modules/` aur `src/` ki zaroorat nahi (sirf compiled `assets/css/style.css` chahiye).

## Free demo link (GitHub Pages)
GitHub Pages PHP nahi chalata, isliye static HTML copy banti hai:
```bash
bash scripts/export-static.sh      # dist/ folder banega
```
`dist/` ka content `gh-pages` branch par push hota hai. Is copy me contact form seedha WhatsApp par message bhejta hai.
Asli hosting (PHP wali) par poora PHP version chalega jisme form enquiries save hoti hain.
