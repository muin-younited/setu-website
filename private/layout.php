<?php
// =====================================================================
//  SETU Digital Solutions – Shared Layout, Design System & SEO Helpers
// =====================================================================

if (!function_exists('h')) {
    function h($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
}

function setu_base_url(): string {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'setudigitalsolutions.com';
    return $scheme . '://' . $host;
}

function setu_site_config(): array {
    static $cfg = null;
    if ($cfg === null) { $cfg = require __DIR__ . '/config.php'; }
    return $cfg;
}

function setu_render_header(array $meta = []): void {
    $cfg       = setu_site_config();
    $c         = $cfg['contact'];
    $baseUrl   = setu_base_url();
    $active    = $meta['active'] ?? 'home';
    $path      = $meta['path'] ?? '/';
    $canonical = rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    if ($path === '/' || $path === 'index.php') {
        $canonical = rtrim($baseUrl, '/') . '/';
    }

    $title       = $meta['title'] ?? 'Setu Digital Solutions | Tally Prime Customization, TDL Development, ERP Integration & Business Software';
    $description = $meta['description'] ?? 'Setu Digital Solutions is a trusted business technology partner in Lucknow, India providing Tally Prime customization, TDL development, ERP & API integration, SetuLink, eDocSuite, Setu AI, and industry-specific Tally solutions.';
    $keywords    = $meta['keywords'] ?? 'Setu Digital Solutions, Tally Customization Lucknow, TDL Development Tally Prime, Tally ERP Integration, SetuLink Tally Mobile App, eDocSuite Tally Document Management, Setu AI Tally Analytics';
    $pageHeading = $meta['page_heading'] ?? '';
    $pageSub     = $meta['page_sub'] ?? '';
    $breadcrumb  = $meta['breadcrumb'] ?? '';
    $extraSchema = $meta['extra_schema'] ?? [];

    $graph = [
        [
            '@type'       => ['Organization', 'ITService', 'LocalBusiness'],
            '@id'         => $baseUrl . '/#organization',
            'name'        => 'Setu Digital Solutions',
            'url'         => $baseUrl . '/',
            'logo'        => $baseUrl . '/assets/img/setu-logo.png',
            'image'       => $baseUrl . '/assets/img/setu-logo.png',
            'slogan'      => 'Bridging Business. Connects Everywhere.',
            'description' => 'Setu Digital Solutions is a business technology company dedicated to helping businesses digitize their operations through Tally Prime customization, TDL development, ERP & API integration, web & mobile business applications (SetuLink, eDocSuite, Setu AI), and industry-specific software.',
            'email'       => $c['email'],
            'telephone'   => $c['phone'],
            'address'     => [
                '@type'           => 'PostalAddress',
                'addressLocality' => 'Lucknow',
                'addressRegion'   => 'Uttar Pradesh',
                'addressCountry'  => 'IN',
            ],
            'areaServed'   => ['@type' => 'Country', 'name' => 'India'],
            'openingHours' => 'Mo-Sa 10:00-19:00',
            'sameAs'       => [
                $c['youtube'] ?? 'https://www.youtube.com/@setu7501',
            ],
            'knowsAbout'   => [
                'Tally Prime Customization',
                'TDL (Tally Definition Language) Development',
                'Tally ERP & API Integration',
                'Web & Mobile Business Applications',
                'MIS & Financial Reporting',
                'Document Management Systems',
                'Business Intelligence for Tally',
                'Industry ERP Modules',
                'Bulk SMS & Bulk WhatsApp Messaging (CPaaS)',
            ],
        ],
        [
            '@type'      => 'WebSite',
            '@id'        => $baseUrl . '/#website',
            'url'        => $baseUrl . '/',
            'name'       => 'Setu Digital Solutions',
            'publisher'  => ['@id' => $baseUrl . '/#organization'],
            'inLanguage' => 'en-IN',
        ],
        [
            '@type'       => 'WebPage',
            '@id'         => $canonical . '#webpage',
            'url'         => $canonical,
            'name'        => $title,
            'description' => $description,
            'isPartOf'    => ['@id' => $baseUrl . '/#website'],
            'about'       => ['@id' => $baseUrl . '/#organization'],
            'inLanguage'  => 'en-IN',
        ],
    ];

    if ($breadcrumb !== '') {
        $graph[] = [
            '@type'           => 'BreadcrumbList',
            '@id'             => $canonical . '#breadcrumb',
            'itemListElement' => [
                [
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'name'     => 'Home',
                    'item'     => $baseUrl . '/',
                ],
                [
                    '@type'    => 'ListItem',
                    'position' => 2,
                    'name'     => $breadcrumb,
                    'item'     => $canonical,
                ],
            ],
        ];
    }

    foreach ($extraSchema as $schemaNode) {
        $graph[] = $schemaNode;
    }

    $jsonLd = json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    if (!headers_sent()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; connect-src 'self' https://formsubmit.co; font-src 'self' data:; object-src 'none'; base-uri 'self'; form-action 'self' https://formsubmit.co; frame-ancestors 'self'; upgrade-insecure-requests");
    }
    ?>
<!doctype html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta name="referrer" content="strict-origin-when-cross-origin">
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; connect-src 'self' https://formsubmit.co; font-src 'self' data:; object-src 'none'; base-uri 'self'; form-action 'self' https://formsubmit.co; upgrade-insecure-requests">
<title><?= h($title) ?></title>
<meta name="description" content="<?= h($description) ?>">
<meta name="keywords" content="<?= h($keywords) ?>">
<meta name="author" content="Setu Digital Solutions">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="geo.region" content="IN-UP">
<meta name="geo.placename" content="Lucknow, Uttar Pradesh, India">
<meta name="theme-color" content="#102a56">

<link rel="canonical" href="<?= h($canonical) ?>">
<link rel="icon" type="image/png" href="assets/img/setu-logo.png">
<link rel="apple-touch-icon" href="assets/img/setu-logo.png">
<link rel="alternate" type="text/plain" title="LLMs Information" href="<?= h($baseUrl) ?>/llms.txt">

<!-- Open Graph / Social Preview -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="Setu Digital Solutions">
<meta property="og:locale" content="en_IN">
<meta property="og:url" content="<?= h($canonical) ?>">
<meta property="og:title" content="<?= h($title) ?>">
<meta property="og:description" content="<?= h($description) ?>">
<meta property="og:image" content="<?= h($baseUrl) ?>/assets/img/setu-logo.png">
<meta property="og:image:alt" content="Setu Digital Solutions">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($title) ?>">
<meta name="twitter:description" content="<?= h($description) ?>">
<meta name="twitter:image" content="<?= h($baseUrl) ?>/assets/img/setu-logo.png">

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
<?= $jsonLd . "\n" ?>
</script>

<style>
/* ==========================================================================
   Exact Brand Color Palette & Universal Times New Roman Typography
   ========================================================================== */
:root {
  --navy: #102a56;
  --blue: #0878f9;
  --cyan: #00c8d9;
  --green: #48c83e;
  --ink: #18304f;
  --muted: #62748b;
  --bg-page: #f7fbff;
  --bg-alt: #eef6ff;
  --white: #ffffff;
  --border: #dce8f5;
  --font-sans: 'Times New Roman', Times, serif;
  --font-head: 'Times New Roman', Times, serif;
}

*, *::before, *::after {
  box-sizing: border-box;
  font-family: 'Times New Roman', Times, serif;
}
html { scroll-behavior: smooth; scroll-padding-top: 84px; }
body {
  margin: 0;
  font-family: 'Times New Roman', Times, serif;
  color: var(--ink);
  background: var(--bg-page);
  line-height: 1.65;
  -webkit-font-smoothing: antialiased;
}

h1, h2, h3, h4, h5, h6, p, a, span, li, button, input, select, textarea, label, summary, strong, small {
  font-family: 'Times New Roman', Times, serif;
}

h1, h2, h3, h4 {
  color: var(--navy);
  letter-spacing: normal;
  margin-top: 0;
}

p {
  line-height: 1.75;
  color: var(--muted);
  margin: 0 0 16px;
}

a { color: inherit; text-decoration: none; }

.wrap {
  width: min(1160px, 92%);
  margin: 0 auto;
}

/* ==========================================================================
   1. Top Utility Bar & Solid Header Navigation
   ========================================================================== */
.top-bar {
  background: var(--navy);
  color: var(--white);
  font-size: 14px;
  padding: 10px 0;
  border-bottom: 1px solid #1b3d73;
}
.top-bar-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  flex-wrap: wrap;
}
.top-bar-items {
  display: flex;
  align-items: center;
  gap: 24px;
  flex-wrap: wrap;
}
.top-bar-items span,
.top-bar-items a {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  color: #dce9f7;
}
.top-bar-items a:hover { color: var(--cyan); }

header {
  position: sticky;
  top: 0;
  z-index: 100;
  background: var(--white);
  border-bottom: 1px solid var(--border);
}
header.scrolled {
  box-shadow: 0 4px 20px #102a5612;
}
nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  min-height: 82px;
}
.logo {
  width: 185px;
  max-height: 68px;
  object-fit: contain;
  display: block;
}
.links {
  display: flex;
  align-items: center;
  gap: 28px;
  font-size: 16.5px;
  font-weight: 700;
  color: var(--navy);
}
.links a {
  padding: 8px 0;
  position: relative;
  transition: color 0.2s ease;
}
.links a::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background: var(--blue);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.25s ease;
}
.links a:hover,
.links a.active { color: var(--blue); }
.links a:hover::after,
.links a.active::after { transform: scaleX(1); }

.nav-right {
  display: flex;
  align-items: center;
  gap: 12px;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 13px 22px;
  border-radius: 12px;
  color: var(--white);
  background: linear-gradient(110deg, var(--blue), var(--cyan));
  font-weight: 700;
  font-size: 16px;
  border: 0;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px #0878f933;
}
.btn-secondary {
  background: var(--white);
  color: var(--navy);
  border: 1px solid var(--border);
}
.btn-secondary:hover {
  border-color: var(--blue);
  color: var(--blue);
  box-shadow: 0 6px 16px #102a560f;
}

.menu-btn {
  display: none;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 9px 13px;
  font-size: 18px;
  color: var(--navy);
  cursor: pointer;
}

/* ==========================================================================
   2. Inner Page Title Banner
   ========================================================================== */
.page-hero {
  background: var(--navy);
  color: var(--white);
  padding: 58px 0;
  text-align: center;
  border-bottom: 4px solid var(--blue);
}
.page-hero h1 {
  color: var(--white);
  font-size: clamp(32px, 4.2vw, 48px);
  margin: 0 0 12px;
  line-height: 1.15;
}
.page-hero p {
  color: #cfe2f7;
  font-size: 18px;
  max-width: 680px;
  margin: 0 auto;
}

/* ==========================================================================
   3. Homepage Hero + 5-Pillar Service Bar
   ========================================================================== */
.hero {
  padding: 76px 0 96px;
  background: linear-gradient(120deg, #ffffff, #eef8ff 65%, #f3fff1);
  border-bottom: 1px solid var(--border);
}
.hero-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  align-items: center;
  gap: 48px;
}
.eyebrow {
  display: inline-block;
  color: #0795b7;
  border-left: 3px solid var(--blue);
  padding: 2px 0 2px 10px;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
}
h1 {
  font-size: clamp(36px, 4.6vw, 56px);
  line-height: 1.1;
  margin: 18px 0;
  font-weight: 800;
}
h1 span {
  background: linear-gradient(90deg, var(--blue), var(--cyan), var(--green));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}
.hero-lead {
  font-size: 19px;
  max-width: 600px;
  color: var(--ink);
  margin-bottom: 28px;
}
.actions {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
}
.hero-logo {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 16px;
  min-height: 360px;
  background: transparent;
  border: 0;
  border-radius: 0;
  box-shadow: none;
}
.hero-logo::before {
  content: "";
  position: absolute;
  inset: 8%;
  border-radius: 50%;
  background: radial-gradient(
    circle at 45% 45%,
    rgba(8, 120, 249, 0.11) 0%,
    rgba(0, 200, 217, 0.09) 42%,
    rgba(72, 200, 62, 0.07) 68%,
    rgba(255, 255, 255, 0) 100%
  );
  filter: blur(28px);
  pointer-events: none;
  z-index: 0;
}
.hero-logo > * {
  position: relative;
  z-index: 1;
}
.hero-logo img {
  width: min(100%, 400px);
  height: auto;
  object-fit: contain;
}

.feature-strip-wrap {
  margin-top: -46px;
  position: relative;
  z-index: 10;
  margin-bottom: 20px;
}
.feature-strip {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 14px;
}
.feature-box {
  background: var(--white);
  border: 1px solid var(--border);
  border-top: 3px solid var(--blue);
  border-radius: 14px;
  padding: 22px 18px;
  box-shadow: 0 10px 26px #102a560a;
  transition: transform 0.22s ease, border-top-color 0.22s ease;
}
.feature-box:hover {
  transform: translateY(-4px);
  border-top-color: var(--cyan);
}
.feature-num {
  font-size: 13.5px;
  font-weight: 800;
  color: var(--blue);
  letter-spacing: 1px;
  margin-bottom: 8px;
  display: block;
}
.feature-box h4 {
  font-size: 17px;
  line-height: 1.35;
  margin: 0;
  color: var(--navy);
}

/* ==========================================================================
   4. Shared Section Layouts, Split Panels & Cards
   ========================================================================== */
section { padding: 72px 0; }
.heading {
  max-width: 740px;
  margin-bottom: 38px;
}
.heading.center {
  text-align: center;
  margin-left: auto;
  margin-right: auto;
}
.section-head-row {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 24px;
  flex-wrap: wrap;
  margin-bottom: 38px;
}
.section-head-row .heading {
  margin-bottom: 0;
}
.kicker {
  display: inline-block;
  color: #0795b7;
  font-size: 13px;
  letter-spacing: 2px;
  font-weight: 800;
  text-transform: uppercase;
  margin-bottom: 8px;
}
h2 {
  font-size: clamp(28px, 3.4vw, 40px);
  line-height: 1.18;
  margin: 0 0 12px;
  font-weight: 800;
}

.about-split {
  display: grid;
  grid-template-columns: 0.92fr 1.08fr;
  gap: 48px;
  align-items: start;
}
.about-panel {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 22px;
  padding: 32px;
  box-shadow: 0 12px 30px #102a5608;
}
.about-highlights {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin: 24px 0;
}
.about-stat-box {
  background: var(--bg-page);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 18px;
}
.about-stat-box strong {
  display: block;
  font-size: 26px;
  color: var(--blue);
  margin-bottom: 4px;
}
.about-stat-box span {
  font-size: 15px;
  font-weight: 700;
  color: var(--navy);
}
.call-box {
  display: flex;
  align-items: center;
  gap: 16px;
  padding-top: 22px;
  border-top: 1px solid var(--border);
}
.call-icon {
  width: 50px;
  height: 50px;
  border-radius: 12px;
  background: var(--navy);
  color: var(--white);
  display: grid;
  place-items: center;
  font-size: 22px;
  flex-shrink: 0;
}
.call-box small {
  display: block;
  font-size: 14px;
  color: var(--muted);
  font-weight: 700;
}
.call-box a {
  font-size: 20px;
  font-weight: 800;
  color: var(--navy);
}
.vision-mission-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 22px;
  margin-top: 32px;
}

.strip {
  background: linear-gradient(120deg, #eff8ff, #f4fff1);
  border-block: 1px solid #e5f0f7;
}
.cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 22px;
}
.cards-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 22px;
}
.card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 30px;
  box-shadow: 0 8px 24px #102a5608;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}
.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 14px 32px #102a5612;
  border-color: #bdd6f0;
}
.card h3 {
  font-size: 22px;
  margin: 0 0 10px;
  color: var(--navy);
}
.card p {
  font-size: 16px;
  margin: 0;
  color: var(--muted);
}
.card-points {
  margin: 14px 0 0;
  padding-left: 20px;
  color: var(--ink);
  font-size: 16px;
  line-height: 1.75;
}
.card-points li { margin-bottom: 5px; }
.card-foot {
  margin-top: 20px;
  padding-top: 16px;
  border-top: 1px solid #edf3fa;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 15px;
  font-weight: 700;
  color: var(--blue);
}

/* ==========================================================================
   5. Feature Showcase Rows (For Products & Services Pages)
   ========================================================================== */
.showcase-list {
  display: flex;
  flex-direction: column;
  gap: 26px;
}
.showcase-row {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 22px;
  padding: 36px;
  box-shadow: 0 10px 28px #102a5608;
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 36px;
  align-items: center;
}
.showcase-row h3 {
  font-size: 28px;
  margin: 6px 0 12px;
}
.showcase-side {
  background: var(--bg-page);
  border: 1px solid var(--border);
  border-left: 4px solid var(--blue);
  border-radius: 16px;
  padding: 26px;
}
.showcase-side h4 {
  font-size: 19px;
  margin: 0 0 12px;
  color: var(--navy);
}
.showcase-side ul {
  margin: 0;
  padding-left: 20px;
  color: var(--ink);
  font-size: 16px;
  line-height: 1.8;
}

/* ==========================================================================
   6. Why Choose Us — Interactive 3-Tab Showcase + Industry Chips
   ========================================================================== */
.tabs-nav {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
  margin-bottom: 24px;
}
.tab-btn {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 18px 20px;
  text-align: left;
  font-size: 17.5px;
  font-weight: 700;
  color: var(--navy);
  cursor: pointer;
  transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}
.tab-btn span {
  display: block;
  font-size: 14px;
  font-weight: 400;
  color: var(--muted);
  margin-top: 4px;
}
.tab-btn.active {
  background: var(--navy);
  color: var(--white);
  border-color: var(--navy);
}
.tab-btn.active span { color: #cfe2f7; }

.tab-panel {
  display: none;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 34px;
  box-shadow: 0 10px 28px #102a5608;
}
.tab-panel.active {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 36px;
  align-items: center;
}
.tab-panel h3 {
  font-size: 26px;
  margin-bottom: 12px;
}
.tab-points {
  margin: 18px 0 24px;
  padding-left: 20px;
  color: var(--ink);
  font-size: 16px;
  line-height: 1.8;
}
.tab-highlight-card {
  background: var(--bg-page);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 26px;
}
.tab-highlight-card strong {
  display: block;
  font-size: 19px;
  color: var(--navy);
  margin-bottom: 8px;
}

.chips {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 24px;
}
.chip {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 11px;
  padding: 13px 18px;
  font-weight: 700;
  font-size: 15px;
  color: var(--navy);
  cursor: pointer;
  transition: border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
}
.chip:hover {
  border-color: var(--blue);
  color: var(--blue);
  transform: translateY(-2px);
}

/* ==========================================================================
   7. Solid Navy Authority Stats Banner & Pre-Footer CTA Strip
   ========================================================================== */
.stats-banner {
  background: var(--navy);
  color: var(--white);
  padding: 64px 0;
}
.stats-banner h2 {
  color: var(--white);
  text-align: center;
  margin-bottom: 10px;
}
.stats-banner .stats-sub {
  text-align: center;
  color: #cfe2f7;
  max-width: 620px;
  margin: 0 auto 40px;
  font-size: 17px;
}
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.stat-card {
  background: #16376e;
  border: 1px solid #254b8a;
  border-radius: 16px;
  padding: 28px 20px;
  text-align: center;
}
.stat-card strong {
  display: block;
  font-size: clamp(30px, 3.5vw, 42px);
  font-weight: 800;
  color: var(--cyan);
  line-height: 1.1;
  margin-bottom: 8px;
}
.stat-card span {
  font-size: 16px;
  font-weight: 700;
  color: var(--white);
}

/* Clean Pre-Footer Call-to-Action Strip (Replaces Duplicate Contact Form) */
.pre-footer-cta {
  background: linear-gradient(110deg, var(--navy), var(--blue));
  color: var(--white);
  padding: 52px 0;
}
.pre-footer-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 28px;
  flex-wrap: wrap;
}
.pre-footer-inner h2 {
  color: var(--white);
  font-size: clamp(24px, 3vw, 34px);
  margin: 0 0 8px;
}
.pre-footer-inner p {
  color: #dce9f7;
  font-size: 17px;
  margin: 0;
  max-width: 640px;
}
.pre-footer-actions {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
}
.btn-white {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 14px 26px;
  border-radius: 12px;
  background: var(--white);
  color: var(--navy);
  font-weight: 800;
  font-size: 16px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.btn-white:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px #00000026;
}

/* ==========================================================================
   8. Team Profiles
   ========================================================================== */
.team-stack {
  display: flex;
  flex-direction: column;
  gap: 22px;
}
.dev-head {
  display: grid;
  grid-template-columns: 160px minmax(0, 1fr);
  align-items: start;
  gap: 26px;
  width: 100%;
  padding: 26px;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 20px;
  box-shadow: 0 8px 24px #102a5608;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.dev-head:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 30px #102a5612;
}
.dev-head > img.dev-photo {
  grid-column: 1;
  grid-row: 1;
  width: 140px;
  height: 180px;
  min-width: 140px;
  max-width: 140px;
  object-fit: cover;
  object-position: center top;
  display: block;
  margin: 0 auto;
  border: 2px solid #d5e4f3;
  border-radius: 12px;
  padding: 3px;
  background: var(--white);
}
.dev-head > div {
  grid-column: 2;
  grid-row: 1;
  min-width: 0;
  width: 100%;
}
.dev-label {
  font-size: 12.5px;
  letter-spacing: 1.4px;
  font-weight: 800;
  color: #0797b2;
  text-transform: uppercase;
}
.dev-head h3 {
  font-size: 25px;
  color: var(--navy);
  margin: 6px 0 10px;
}
.dev-head p {
  font-size: 16.5px;
  line-height: 1.75;
  margin: 0 0 14px;
}
.dev-points {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}
.dev-points span {
  font-size: 13.5px;
  font-weight: 700;
  color: #31506f;
  background: #f4f8fc;
  border: 1px solid #dce8f5;
  border-radius: 6px;
  padding: 5px 11px;
}

/* ==========================================================================
   9. FAQ Accordion
   ========================================================================== */
.faq-list {
  display: grid;
  gap: 14px;
  max-width: 920px;
}
.faq-item {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 20px 24px;
}
.faq-item summary {
  font-size: 18px;
  font-weight: 700;
  color: var(--navy);
  cursor: pointer;
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary::after {
  content: "+";
  font-size: 22px;
  font-weight: 700;
  color: var(--blue);
  line-height: 1;
}
.faq-item[open] summary::after { content: "−"; }
.faq-item p {
  margin: 14px 0 0;
  padding-top: 14px;
  border-top: 1px solid #edf3fa;
  font-size: 16px;
}

/* ==========================================================================
   10. Structured Multi-Column Footer
   ========================================================================== */
footer {
  background: var(--navy);
  color: #dce9f7;
  padding: 52px 0 28px;
}
.foot-grid {
  display: grid;
  grid-template-columns: 1.3fr 0.8fr 0.9fr 1fr;
  gap: 32px;
  padding-bottom: 34px;
  border-bottom: 1px solid #1e3f78;
}
footer img { width: 155px; height: auto; margin-bottom: 10px; }
footer h4 {
  color: var(--white);
  font-size: 18px;
  margin: 0 0 14px;
}
footer p { color: #b9cce2; font-size: 15px; margin: 0 0 10px; }
.foot-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: 9px;
  font-size: 15px;
}
.foot-list a { color: #b9cce2; transition: color 0.2s ease; }
.foot-list a:hover { color: var(--cyan); }
.social-links-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: 11px;
}
.social-links-list a {
  display: inline-flex;
  align-items: center;
  gap: 11px;
  color: #dce9f7;
  font-size: 15.5px;
  transition: color 0.2s ease, transform 0.2s ease;
}
.social-links-list a:hover {
  color: var(--cyan);
  transform: translateX(3px);
}
.social-icon-box {
  width: 34px;
  height: 34px;
  border-radius: 8px;
  background: #173a73;
  border: 1px solid #285296;
  color: var(--white);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: background 0.2s ease, border-color 0.2s ease;
}
.social-links-list a:hover .social-icon-box {
  background: var(--blue);
  border-color: var(--cyan);
}
.social-icon-box svg {
  width: 16px;
  height: 16px;
  fill: currentColor;
}
.foot-bottom {
  padding-top: 22px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  gap: 6px;
  font-size: 14px;
  color: #9ab3cf;
}

/* ==========================================================================
   11. Subtle Scroll Reveal
   ========================================================================== */
.reveal {
  opacity: 0;
  transform: translateY(18px);
  transition: opacity 0.55s ease, transform 0.55s ease;
}
.reveal.is-visible {
  opacity: 1;
  transform: translateY(0);
}
@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  .reveal { opacity: 1; transform: none; transition: none; }
}

/* ==========================================================================
   Responsive Breakpoints
   ========================================================================== */
@media (max-width: 980px) {
  .feature-strip { grid-template-columns: repeat(3, 1fr); }
  .about-split, .tab-panel.active, .showcase-row { grid-template-columns: 1fr; }
  .stats-grid, .foot-grid { grid-template-columns: repeat(2, 1fr); }
  .cards, .cards-2 { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 820px) {
  .top-bar { display: none; }
  .menu-btn { display: inline-flex; align-items: center; justify-content: center; }
  .links {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--white);
    flex-direction: column;
    align-items: flex-start;
    padding: 18px 4%;
    gap: 12px;
    border-bottom: 1px solid var(--border);
    box-shadow: 0 12px 24px #102a5614;
  }
  .links.open { display: flex; }
  .hero-grid {
    grid-template-columns: minmax(0, 1fr) auto;
    align-items: center;
    gap: 0 12px;
  }
  .hero-copy {
    display: contents;
  }
  .hero-grid .eyebrow {
    grid-column: 1;
    grid-row: 1;
    align-self: center;
    font-size: 11.5px;
    letter-spacing: 1.5px;
  }
  .hero-grid .hero-logo {
    grid-column: 2;
    grid-row: 1;
    min-height: 0;
    padding: 0;
    justify-self: end;
    align-self: center;
  }
  .hero-grid .hero-logo::before {
    inset: -10%;
    filter: blur(12px);
  }
  .hero-grid .hero-logo .setu-hero-logo-svg,
  .hero-grid .hero-logo img {
    width: 72px;
    height: auto;
  }
  .hero-grid h1 {
    grid-column: 1 / -1;
    grid-row: 2;
    margin: 10px 0 16px;
  }
  .hero-grid .hero-lead {
    grid-column: 1 / -1;
    grid-row: 3;
  }
  .hero-grid .actions {
    grid-column: 1 / -1;
    grid-row: 4;
  }
  .tabs-nav { grid-template-columns: 1fr; }
  .vision-mission-grid { grid-template-columns: 1fr; }
}
@media (max-width: 620px) {
  .feature-strip { grid-template-columns: 1fr 1fr; }
  .dev-head {
    grid-template-columns: 1fr;
    gap: 16px;
    padding: 20px;
  }
  .dev-head > img.dev-photo { grid-column: 1; grid-row: 1; }
  .dev-head > div { grid-column: 1; grid-row: 2; }
  footer {
    padding: 36px 0 24px;
  }
  .foot-grid {
    grid-template-columns: 1fr 1fr;
    gap: 22px 20px;
  }
  .foot-col-brand {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 0 8px 6px;
    border-bottom: 0;
  }
  .foot-col-brand img {
    display: block;
    width: 170px;
    max-width: 52%;
    height: auto;
    margin: -22px auto -14px;
  }
  .foot-col-brand .foot-tagline {
    color: var(--white);
    font-size: clamp(18px, 4.8vw, 20px);
    font-weight: 700;
    line-height: 1.3;
    max-width: 280px;
    margin: 0 auto 10px;
  }
  .foot-col-brand .foot-desc {
    color: #c8daf0;
    font-size: 14.5px;
    line-height: 1.55;
    max-width: 320px;
    margin: 0 auto 20px;
  }
  .foot-col-brand::after {
    content: "";
    display: block;
    width: 80%;
    max-width: 280px;
    height: 1.5px;
    background: #4e8ff7;
    border-radius: 2px;
    margin: 0 auto;
  }
  .foot-col-links {
    grid-column: 1;
    grid-row: 2;
  }
  .foot-col-social {
    grid-column: 2;
    grid-row: 2;
  }
  .foot-col-info {
    grid-column: 1 / -1;
    grid-row: 3;
    padding-top: 18px;
    border-top: 1px solid #1e3f78;
  }
}
@media (max-width: 540px) {
  .feature-strip, .cards, .cards-2, .stats-grid, .about-highlights { grid-template-columns: 1fr; }
  nav { min-height: 70px; }
  .logo { width: 145px; }
  .nav-right .btn { padding: 10px 15px; font-size: 14.5px; border-radius: 10px; }
  section { padding: 54px 0; }
  .hero { padding: 36px 0 72px; }
  .showcase-row { padding: 24px; }
}
@media (max-width: 360px) {
  .hero-grid .eyebrow {
    font-size: 10.5px;
    letter-spacing: 1.1px;
  }
  .hero-grid .hero-logo .setu-hero-logo-svg,
  .hero-grid .hero-logo img {
    width: 65px;
  }
}
</style>
</head>
<body>

<!-- Top Utility Contact Bar -->
<div class="top-bar">
  <div class="wrap top-bar-inner">
    <div class="top-bar-items">
      <a href="tel:<?= h($c['phone_link']) ?>"><span>☎</span> <?= h($c['phone']) ?></a>
      <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#BFE8FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:block;flex-shrink:0;" aria-hidden="true"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg> <?= h($c['address']) ?></span>
      <a href="mailto:<?= h($c['email']) ?>"><span>✉</span> <?= h($c['email']) ?></a>
    </div>
    <div class="top-bar-items">
      <span><span>◷</span> <?= h($c['days']) ?>: <?= h($c['hours']) ?></span>
    </div>
  </div>
</div>

<!-- Solid Clean Header Navigation -->
<header id="siteHeader">
  <div class="wrap">
    <nav aria-label="Main Navigation">
      <a href="index.php">
        <img class="logo" src="assets/img/setu-logo.png" alt="Setu Digital Solutions" width="185" height="68" fetchpriority="high">
      </a>
      <div class="links" id="navLinks">
        <a href="index.php" class="<?= $active === 'home' ? 'active' : '' ?>">Home</a>
        <a href="about.php" class="<?= $active === 'about' ? 'active' : '' ?>">About Us</a>
        <a href="services.php" class="<?= $active === 'services' ? 'active' : '' ?>">Services</a>
        <a href="products.php" class="<?= $active === 'products' ? 'active' : '' ?>">Products</a>
        <a href="solutions.php" class="<?= $active === 'solutions' ? 'active' : '' ?>">Solutions</a>
        <a href="team.php" class="<?= $active === 'team' ? 'active' : '' ?>">Our Team</a>
      </div>
      <div class="nav-right">
        <a class="btn" href="contact.php">Contact Us</a>
        <button class="menu-btn" id="menuBtn" type="button" aria-expanded="false" aria-controls="navLinks" aria-label="Menu">☰</button>
      </div>
    </nav>
  </div>
</header>

<main id="home">
<?php if ($pageHeading !== ''): ?>
  <!-- Inner Page Title Banner -->
  <section class="page-hero" aria-label="Page Header">
    <div class="wrap">
      <h1><?= h($pageHeading) ?></h1>
      <?php if ($pageSub !== ''): ?>
        <p><?= h($pageSub) ?></p>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
<?php
}

function setu_render_cta_strip(
    string $heading = 'Looking for the right Tally or digital solution for your business?',
    string $subtext = 'Speak with our team to discuss your workflow or schedule a live product demonstration.',
    string $btnText = 'Get in Touch →',
    string $btnHref = 'contact.php'
): void {
    ?>
  <!-- Clean Pre-Footer CTA Strip -->
  <section class="pre-footer-cta" aria-label="Call to Action">
    <div class="wrap pre-footer-inner">
      <div>
        <h2><?= h($heading) ?></h2>
        <p><?= h($subtext) ?></p>
      </div>
      <div class="pre-footer-actions">
        <a class="btn-white" href="<?= h($btnHref) ?>"><?= h($btnText) ?></a>
      </div>
    </div>
  </section>
    <?php
}

function setu_render_footer(): void {
    $c = setu_site_config()['contact'];
    $fb = !empty($c['facebook']) ? $c['facebook'] : 'https://www.facebook.com/';
    $ig = !empty($c['instagram']) ? $c['instagram'] : 'https://www.instagram.com/';
    $li = !empty($c['linkedin']) ? $c['linkedin'] : 'https://www.linkedin.com/';
    $yt = !empty($c['youtube']) ? $c['youtube'] : 'https://www.youtube.com/';
    $wa = 'https://wa.me/' . rawurlencode($c['whatsapp'] ?? '');
    ?>
</main>

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-col-brand">
        <img src="assets/img/setu-logo.png" alt="Setu Digital Solutions" width="155" height="58" loading="lazy">
        <p class="foot-tagline">Bridging Business. Connects Everywhere.</p>
        <p class="foot-desc">Practical Tally Prime customizations, ERP integrations, and digital business applications tailored to how your team works.</p>
      </div>
      <div class="foot-col-links">
        <h4>Quick Links</h4>
        <ul class="foot-list">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Our Services</a></li>
          <li><a href="products.php">Featured Products</a></li>
          <li><a href="solutions.php">Industry Solutions</a></li>
          <li><a href="team.php">Our Team</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="foot-col-info">
        <h4>Official Info</h4>
        <p><strong>Address:</strong> <?= h($c['address']) ?></p>
        <p><strong>Phone:</strong> <a href="tel:<?= h($c['phone_link']) ?>" style="color:#dce9f7;"><?= h($c['phone']) ?></a></p>
        <p><strong>Email:</strong> <a href="mailto:<?= h($c['email']) ?>" style="color:#dce9f7;"><?= h($c['email']) ?></a></p>
        <p><strong>Hours:</strong> <?= h($c['days']) ?>, <?= h($c['hours']) ?></p>
      </div>
      <div class="foot-col-social">
        <h4>Social Links</h4>
        <ul class="social-links-list" aria-label="Social Media Links">
          <li>
            <a href="<?= h($fb) ?>" target="_blank" rel="noopener noreferrer">
              <span class="social-icon-box" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M13.5 22v-8.2h2.8l.4-3.2h-3.2V8.5c0-.9.3-1.6 1.6-1.6h1.7V4.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.3H7.3v3.2h2.8V22h3.4z"/></svg>
              </span>
              <span>Facebook</span>
            </a>
          </li>
          <li>
            <a href="<?= h($ig) ?>" target="_blank" rel="noopener noreferrer">
              <span class="social-icon-box" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1.1.4 2.2.1 1.3.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1.1.4-2.2.4-1.3.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1.1-.4-2.2-.1-1.3-.1-1.6-.1-4.8s0-3.6.1-4.8c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1.1-.4 2.2-.4 1.2-.1 1.6-.1 4.8-.1zM12 0C8.7 0 8.3 0 7.1.1 5.8.1 4.9.3 4.1.6c-.8.3-1.5.7-2.2 1.4C1.2 2.7.8 3.3.5 4.1c-.3.8-.5 1.7-.5 3C0 8.3 0 8.7 0 12s0 3.7.1 4.9c.1 1.3.3 2.1.6 2.9.3.8.7 1.5 1.4 2.2.7.7 1.3 1.1 2.1 1.4.8.3 1.6.5 2.9.6 1.2.1 1.6.1 4.9.1s3.7 0 4.9-.1c1.3-.1 2.1-.3 2.9-.6.8-.3 1.5-.7 2.2-1.4.7-.7 1.1-1.3 1.4-2.1.3-.8.5-1.6.6-2.9.1-1.2.1-1.6.1-4.9s0-3.7-.1-4.9c-.1-1.3-.3-2.1-.6-2.9-.3-.8-.7-1.5-1.4-2.2C21.3 1.2 20.7.8 19.9.5c-.8-.3-1.6-.5-2.9-.6C15.7 0 15.3 0 12 0zm0 5.8a6.2 6.2 0 1 0 0 12.4 6.2 6.2 0 0 0 0-12.4zm0 10.2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-11.8a1.4 1.4 0 1 0 0 2.8 1.4 1.4 0 0 0 0-2.8z"/></svg>
              </span>
              <span>Instagram</span>
            </a>
          </li>
          <li>
            <a href="<?= h($li) ?>" target="_blank" rel="noopener noreferrer">
              <span class="social-icon-box" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M6.9 20.5H3.6V9h3.3v11.5zM5.3 7.4a1.9 1.9 0 1 1 0-3.8 1.9 1.9 0 0 1 0 3.8zM20.5 20.5h-3.3v-5.6c0-1.3 0-3-1.9-3s-2.1 1.4-2.1 2.9v5.7H9.9V9h3.2v1.6h.1c.4-.8 1.5-1.9 3.1-1.9 3.3 0 3.9 2.2 3.9 5v6.8z"/></svg>
              </span>
              <span>LinkedIn</span>
            </a>
          </li>
          <li>
            <a href="<?= h($yt) ?>" target="_blank" rel="noopener noreferrer">
              <span class="social-icon-box" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>
              </span>
              <span>YouTube</span>
            </a>
          </li>
          <li>
            <a href="<?= h($wa) ?>" target="_blank" rel="noopener noreferrer">
              <span class="social-icon-box" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M20.5 3.5A11.8 11.8 0 0 0 12 0C5.5 0 .2 5.3.2 11.8c0 2.1.5 4.1 1.6 5.9L0 24l6.5-1.7a11.9 11.9 0 0 0 5.5 1.4c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.2-3.3-8.4zM12 21.7c-1.8 0-3.5-.5-5.1-1.4l-.4-.2-3.8 1 1-3.7-.2-.4a9.8 9.8 0 0 1-1.5-5.2c0-5.4 4.4-9.8 9.8-9.8 2.6 0 5.1 1 6.9 2.9a9.7 9.7 0 0 1 2.9 6.9c.1 5.4-4.3 9.9-9.6 9.9zm5.4-7.4c-.3-.1-1.7-.9-2-1-.3-.1-.5-.1-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.2-.5-2.4-1.5-.9-.8-1.5-1.8-1.6-2.1-.2-.3 0-.5.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.7-.7 2-1.4.2-.7.2-1.3.1-1.4-.1-.1-.3-.2-.6-.3z"/></svg>
              </span>
              <span>WhatsApp</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="foot-bottom">
      <span>© <?= date('Y') ?> Setu Digital Solutions. All rights reserved.</span>
      <span>Tally Customization · Integration · Digital Products</span>
    </div>
  </div>
</footer>

<script>
(function(){
  // Anti-Clickjacking frame-busting defense
  if (window.top !== window.self) {
    try { window.top.location = window.self.location.href; } catch (_) {}
  }

  if (window.history && window.history.replaceState) {
    const p = window.location.pathname;
    if (p.endsWith('/index.html')) {
      window.history.replaceState(null, '', p.slice(0, -10) + window.location.search + window.location.hash);
    } else if (p.endsWith('.html')) {
      window.history.replaceState(null, '', p.slice(0, -5) + window.location.search + window.location.hash);
    }
  }

  const header = document.getElementById('siteHeader');
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.getElementById('navLinks');

  window.addEventListener('scroll', () => {
    if (header) header.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });

  if (menuBtn && navLinks) {
    menuBtn.addEventListener('click', () => {
      const open = navLinks.classList.toggle('open');
      menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    navLinks.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        navLinks.classList.remove('open');
        menuBtn.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // Interactive Tabs
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabBtns.forEach(b => { b.classList.remove('active'); b.setAttribute('aria-selected', 'false'); });
      tabPanels.forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');
      const target = document.getElementById(btn.dataset.tab);
      if (target) target.classList.add('active');
    });
  });

  // Scroll Reveal
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('is-visible');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });
    reveals.forEach(el => io.observe(el));
  } else {
    reveals.forEach(el => el.classList.add('is-visible'));
  }
})();
</script>
</body>
</html>
<?php
}
