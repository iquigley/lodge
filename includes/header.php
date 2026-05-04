<?php
// Required variables before including:
//   $page_title       — full <title> string
//   $page_description — meta description
//   $page_canonical   — path, e.g. "/" or "/about"
//   $page_active      — nav item key: home|history|about|contact

$site_url    = 'https://guilford656.org';
$canonical   = $site_url . ($page_canonical ?? '/');
$og_image    = $site_url . '/images/og-image.jpg';

// JSON-LD: LocalBusiness schema
$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'LocalBusiness',
    'name'     => 'Guilford Lodge #656',
    'url'      => $site_url,
    'telephone' => '',
    'address'  => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => '426 West Market Street',
        'addressLocality' => 'Greensboro',
        'addressRegion'   => 'NC',
        'postalCode'      => '27401',
        'addressCountry'  => 'US',
    ],
    'openingHours' => 'Mo 19:00-21:00',
    'description'  => 'Guilford Lodge #656 is a Masonic lodge founded in 1923, meeting in Greensboro, North Carolina.',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary SEO -->
    <title><?= htmlspecialchars($page_title ?? 'Guilford Lodge #656') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description ?? '') ?>">
    <meta name="keywords" content="Masonic lodge, Freemasonry, Greensboro NC, Guilford Lodge 656, join Masons, brotherhood">
    <meta name="author" content="Guilford Lodge #656">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:title"       content="<?= htmlspecialchars($page_title ?? 'Guilford Lodge #656') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description ?? '') ?>">
    <meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>">
    <meta property="og:site_name"   content="Guilford Lodge #656">
    <meta property="og:locale"      content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?= htmlspecialchars($page_title ?? 'Guilford Lodge #656') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($page_description ?? '') ?>">
    <meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?></script>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Site styles -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Favicon (replace with actual favicon files) -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>

<!-- ── Navigation ─────────────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="/">
            <img class="brand-emblem" src="/images/logo.png" alt="Guilford Lodge #656 emblem" width="38" height="38">
            <span class="brand-text">
                <span class="brand-name">Guilford Lodge</span>
                <span class="brand-number">No. 656 &nbsp;·&nbsp; A.F. &amp; A.M.</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($page_active ?? '') === 'home'    ? 'active' : '' ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page_active ?? '') === 'history' ? 'active' : '' ?>" href="/history">Our History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page_active ?? '') === 'about'   ? 'active' : '' ?>" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page_active ?? '') === 'contact' ? 'active' : '' ?>" href="/contact">Join Us</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- /Navigation -->
