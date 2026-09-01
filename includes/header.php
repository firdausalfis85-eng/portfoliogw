<?php
/**
 * header.php
 * Berisi doctype, head, dan navbar.
 * $profile harus sudah tersedia sebelum include file ini.
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Portfolio & Biodata <?= htmlspecialchars($profile['nama_lengkap']) ?> — <?= htmlspecialchars($profile['profesi']) ?>" />
    <meta name="keywords" content="portfolio, biodata, developer, <?= htmlspecialchars($profile['profesi']) ?>, <?= htmlspecialchars($profile['nama_lengkap']) ?>" />
    <meta name="author" content="<?= htmlspecialchars($profile['nama_lengkap']) ?>" />

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($profile['nama_lengkap']) ?> | Portfolio" />
    <meta property="og:description" content="<?= htmlspecialchars($profile['tagline']) ?>" />
    <meta property="og:type" content="website" />

    <title><?= htmlspecialchars($profile['nama_lengkap']) ?> | <?= htmlspecialchars($profile['profesi']) ?></title>

    <!-- Google Fonts: Plus Jakarta Sans + Outfit + Fira Code -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Stylesheet Utama -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>" />

    <!-- Favicon inline SVG -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><defs><linearGradient id='g' x1='0%25' y1='0%25' x2='100%25' y2='100%25'><stop offset='0%25' style='stop-color:%237F00FF'/><stop offset='100%25' style='stop-color:%2300f2fe'/></linearGradient></defs><rect width='100' height='100' rx='20' fill='url(%23g)'/><text y='.9em' font-size='70' x='15' fill='white' font-family='Arial'>P</text></svg>" />
</head>
<body>

    <!-- ══════════════ CUSTOM CURSOR ══════════════ -->
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <!-- ══════════════ BACKGROUND ORBS ══════════════ -->
    <div class="bg-orbs" aria-hidden="true">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="orb orb-4"></div>
    </div>

    <!-- ══════════════ NAVBAR ══════════════ -->
    <nav class="navbar" id="navbar" role="navigation" aria-label="Navigasi Utama">
        <div class="nav-container">
            <!-- Logo -->
            <a href="#hero" class="nav-logo" aria-label="Kembali ke atas">
                <span class="logo-bracket">&lt;</span>
                <span class="logo-text"><?= strtoupper(explode(' ', trim($profile['nama_lengkap']))[0] !== '[EDIT_NAMA_LENGKAP]' ? (explode(' ', trim($profile['nama_lengkap']))[0]) : 'DEV') ?></span>
                <span class="logo-bracket">/&gt;</span>
            </a>

            <!-- Nav Links -->
            <ul class="nav-links" id="navLinks" role="list">
                <li><a href="#about"    class="nav-link" data-section="about">About</a></li>
                <li><a href="#projects" class="nav-link" data-section="projects">Projects</a></li>
                <li><a href="#skills"   class="nav-link" data-section="skills">Skills</a></li>
                <li><a href="#contact"  class="nav-link" data-section="contact">Contact</a></li>
            </ul>

            <!-- CTA Nav -->
            <a href="mailto:<?= htmlspecialchars($profile['kontak']['email']) ?>" class="nav-cta" aria-label="Kirim email">
                <span>Hire Me</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <!-- Hamburger Mobile -->
            <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="navLinks">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </nav>

    <!-- ══════════════ MAIN CONTENT ══════════════ -->
    <main id="main-content">
