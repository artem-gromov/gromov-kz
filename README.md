# Artem Gromov — Retro-Futuristic CV

Single-page CRT-inspired CV for Artem Gromov. Built with PHP 8+, vanilla CSS, and minimal JS so it can be deployed as-is to typical shared hosting.

## Requirements

- PHP 8.0 or newer
- Standard PHP extensions (no external dependencies)
- Web server capable of routing all traffic to `index.php`

## Project Structure

```
.
├── index.php
├── partials/
│   ├── footer.php
│   ├── header.php
│   ├── metrics.php
│   └── skills.php
├── assets/
│   ├── ArtemGromov.vcf
│   ├── css/style.css
│   ├── img/
│   │   ├── avatar-temp.jpg
│   │   └── favicon.png
│   └── js/app.js
├── data/
│   └── metrics.json
└── README.md
```

## Running Locally

```bash
php -S localhost:8080
```

Navigate to `http://localhost:8080` in your browser.

## Deploying to Shared Hosting

1. Ensure the hosting account runs PHP 8.0 or newer.
2. Upload the repository contents to the document root (for example, `/public_html`).
3. Visit your domain — the single `index.php` handles rendering.

No build steps or additional tooling is required. To keep everything self-contained, avoid moving assets outside the repository structure.

## Customization Guide

- **Identity & narrative**: Edit variables near the top of `index.php` (name, title, optional sections).
- **Skills**: Update the `$skillsGroups` array in `index.php`.
- **Optional sections**: Adjust the `$optionalSections` array to change placeholder copy or replace them with real content.
- **Contact info**: Look for `$emailLocalPart`, `$emailDomain`, and the Telegram URL in `index.php`.
- **Avatar**: Replace `assets/img/avatar-temp.jpg` with a 420×420 JPG (keep the filename to avoid further changes).
- **Theme tweaks**: Modify color tokens in `assets/css/style.css` (`:root` variables) or extend the CRT effects.
- **vCard**: Update `assets/ArtemGromov.vcf` to keep contact details in sync.

### Storage Metrics Data Source

Metrics are loaded through `loadLatestMetrics()` in `index.php`.

1. By default, the function reads from `data/metrics.json`.
2. If the file is missing or invalid, it falls back to the embedded array.
3. Replace `data/metrics.json` with live output from your pipeline, maintaining the same keys.

To switch to a database source later, replace the file-reading block inside `loadLatestMetrics()` with a query that returns an associative array shaped like the sample.

### Print / PDF

The “Print / Save PDF” buttons call `window.print()`. A dedicated `@media print` stylesheet ensures a clean A4 layout with effects removed. Trigger the print dialog and save as PDF to export.

## Accessibility, Performance & Motion Preferences

- Semantic landmarks (`header`, `main`, `footer`) and a skip link support keyboard navigation.
- Prefers-reduced-motion automatically disables scanlines, noise, and caret animations; users can also toggle effects manually via the “Reduce CRT effects” button.
- All assets are local to keep the page offline-friendly.

## Updating Content Safely

- Validate changes with `php -l <file>` to catch syntax issues.
- Check the layout in both desktop and mobile breakpoints.
- Run Lighthouse or similar audits to confirm performance and accessibility remain high.

## Replacing External Assets

If you later download the official avatar or add custom fonts, place them under `assets/img/` or `assets/fonts/` and update the CSS references accordingly. Keep third-party tracking scripts out of the project to preserve the privacy-by-default stance.
