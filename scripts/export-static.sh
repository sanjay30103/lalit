#!/usr/bin/env bash
# Static HTML copy of the site for GitHub Pages (PHP nahi chalta wahan).
# Usage: bash scripts/export-static.sh   -> output: dist/
set -euo pipefail
cd "$(dirname "$0")/.."

PORT=8199
OUT=dist
rm -rf "$OUT" && mkdir -p "$OUT"
npm run build >/dev/null

STATIC_EXPORT=1 php -S 127.0.0.1:$PORT >/dev/null 2>&1 &
PID=$!
trap 'kill $PID 2>/dev/null || true' EXIT
sleep 1

for page in index services properties projects about contact brand; do
  curl -sf "http://127.0.0.1:$PORT/$page.php" \
    | sed -E 's#(href|action)="(index|services|properties|projects|about|contact|brand)\.php#\1="\2.html#g' \
    > "$OUT/$page.html"
  echo "  $page.html"
done

mkdir -p "$OUT/assets"
cp -R assets/css assets/js assets/brand assets/images "$OUT/assets/"
touch "$OUT/.nojekyll"
echo "Done -> $OUT/"
