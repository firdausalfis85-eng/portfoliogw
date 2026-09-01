<?php
/**
 * index.php — Halaman Utama Portfolio
 * Vibrant Neo-Modern PHP Portfolio
 */

// ── Load konfigurasi data profil ──────────────────────────────────────────────
$profile = require_once __DIR__ . '/config/profile_data.php';

// ── Include Header (membutuhkan $profile) ─────────────────────────────────────
require_once __DIR__ . '/includes/header.php';
?>

<!-- ╔══════════════════════════════════════════════════════╗
     ║  SECTION 1 — HERO                                    ║
     ╚══════════════════════════════════════════════════════╝ -->
<section class="hero-section" id="hero" aria-label="Hero Section">

    <!-- Particle dots background -->
    <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>

    <div class="hero-container">

        <!-- Kolom Teks -->
        <div class="hero-content fade-in-up" data-delay="0">

            <div class="hero-badge">
                <span class="badge-dot pulse"></span>
                <span>Available for Work</span>
            </div>

            <h1 class="hero-title">
                <span class="hero-greeting">Halo, Saya</span>
                <span class="hero-name gradient-text animated-gradient" id="heroName">
                    <?= htmlspecialchars($profile['nama_lengkap']) ?>
                </span>
            </h1>

            <p class="hero-tagline">
                <span class="typing-text" id="typingText" aria-live="polite"></span>
                <span class="typing-cursor" aria-hidden="true">|</span>
            </p>

            <p class="hero-bio"><?= htmlspecialchars($profile['bio']) ?></p>

            <!-- CTA Buttons -->
            <div class="hero-cta-group">
                <a href="#projects" class="btn btn-primary" aria-label="Lihat Proyek">
                    <span>Lihat Proyek</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="mailto:<?= htmlspecialchars($profile['kontak']['email']) ?>" class="btn btn-outline" aria-label="Kontak Saya">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    <span>Hubungi Saya</span>
                </a>
            </div>

            <!-- Quick Stats -->
            <div class="hero-stats">
                <?php foreach ($profile['stats'] as $stat): ?>
                    <div class="hero-stat">
                        <span class="stat-icon"><?= $stat['icon'] ?></span>
                        <span class="stat-value gradient-text"><?= htmlspecialchars($stat['value']) ?></span>
                        <span class="stat-label"><?= htmlspecialchars($stat['label']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

        </div><!-- /.hero-content -->

        <!-- Kolom Avatar -->
        <div class="hero-avatar-wrap fade-in-up" data-delay="200">
            <div class="avatar-container" aria-hidden="true">
                <!-- Ring hias animasi -->
                <div class="avatar-ring ring-1"></div>
                <div class="avatar-ring ring-2"></div>
                <div class="avatar-ring ring-3"></div>

                <!-- Avatar Utama -->
                <div class="avatar-img-wrap">
                    <?php if (!empty($profile['avatar_url'])): ?>
                        <img src="<?= htmlspecialchars($profile['avatar_url']) ?>"
                             alt="Foto profil <?= htmlspecialchars($profile['nama_lengkap']) ?>"
                             class="avatar-img"
                             loading="eager" />
                    <?php else: ?>
                        <!-- Placeholder SVG avatar warna-warni -->
                        <svg class="avatar-placeholder" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <defs>
                                <linearGradient id="avatarGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%"   stop-color="#7F00FF"/>
                                    <stop offset="50%"  stop-color="#E100FF"/>
                                    <stop offset="100%" stop-color="#00f2fe"/>
                                </linearGradient>
                                <linearGradient id="bodyGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%"   stop-color="#4facfe"/>
                                    <stop offset="100%" stop-color="#00f2fe"/>
                                </linearGradient>
                            </defs>
                            <rect width="200" height="200" fill="url(#avatarGrad)" rx="50"/>
                            <!-- Kepala -->
                            <circle cx="100" cy="72" r="38" fill="url(#bodyGrad)" opacity="0.9"/>
                            <!-- Badan -->
                            <ellipse cx="100" cy="165" rx="55" ry="45" fill="url(#bodyGrad)" opacity="0.75"/>
                            <!-- Mata kiri -->
                            <ellipse cx="86" cy="68" rx="6" ry="7" fill="#fff"/>
                            <circle  cx="87" cy="69" r="3.5" fill="#0b0f19"/>
                            <!-- Mata kanan -->
                            <ellipse cx="114" cy="68" rx="6" ry="7" fill="#fff"/>
                            <circle  cx="115" cy="69" r="3.5" fill="#0b0f19"/>
                            <!-- Senyum -->
                            <path d="M87 85 Q100 96 113 85" stroke="#fff" stroke-width="3" fill="none" stroke-linecap="round"/>
                            <!-- Teks inisial -->
                            <text x="100" y="175" text-anchor="middle" fill="white" font-size="13" font-family="Outfit,sans-serif" font-weight="700" opacity="0.6">
                                <?= strtoupper(substr($profile['nama_lengkap'], 0, 2)) ?>
                            </text>
                        </svg>
                    <?php endif; ?>
                </div><!-- /.avatar-img-wrap -->

                <!-- Badge floating teknologi -->
                <div class="avatar-badge badge-top-right floating-badge" aria-hidden="true">
                    <span>🎮 MLBB Pro</span>
                </div>
                <div class="avatar-badge badge-bottom-left floating-badge" aria-hidden="true">
                    <span>🎬 Video Editor</span>
                </div>
                <div class="avatar-badge badge-top-left floating-badge" aria-hidden="true">
                    <span>🎨 Digital Art</span>
                </div>
            </div><!-- /.avatar-container -->
        </div><!-- /.hero-avatar-wrap -->

    </div><!-- /.hero-container -->

    <!-- Scroll indicator -->
    <div class="scroll-indicator" aria-hidden="true">
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
        <span class="scroll-text">Scroll Down</span>
    </div>

</section><!-- /#hero -->


<!-- ╔══════════════════════════════════════════════════════╗
     ║  SECTION 2 — ABOUT & BIO                             ║
     ╚══════════════════════════════════════════════════════╝ -->
<section class="about-section" id="about" aria-label="Tentang Saya">
    <div class="section-container">

        <!-- Section Header -->
        <div class="section-header fade-in-up">
            <span class="section-tag">// Tentang Saya</span>
            <h2 class="section-title">Siapa <span class="gradient-text">Saya?</span></h2>
            <p class="section-subtitle">Kenali lebih dekat tentang perjalanan dan passion saya.</p>
        </div>

        <div class="about-grid">

            <!-- Bio Card -->
            <div class="glass-card about-bio-card fade-in-left">
                <div class="card-glow" style="--glow-color: #7F00FF;" aria-hidden="true"></div>
                <h3 class="card-title">
                    <span class="card-icon">👋</span> Bio Singkat
                </h3>
                <p class="about-bio-text"><?= nl2br(htmlspecialchars($profile['bio'])) ?></p>

                <!-- Data Diri Grid -->
                <div class="bio-details-grid">
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">📍</span>
                        <div>
                            <span class="bio-detail-label">Lokasi</span>
                            <span class="bio-detail-value"><?= htmlspecialchars($profile['lokasi']) ?></span>
                        </div>
                    </div>
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">🎂</span>
                        <div>
                            <span class="bio-detail-label">Tempat & Tgl Lahir</span>
                            <span class="bio-detail-value"><?= htmlspecialchars($profile['tempat_lahir']) ?>, <?= htmlspecialchars($profile['tgl_lahir']) ?></span>
                        </div>
                    </div>
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">🎓</span>
                        <div>
                            <span class="bio-detail-label">Sekolah</span>
                            <span class="bio-detail-value"><?= htmlspecialchars($profile['universitas']) ?> — <?= htmlspecialchars($profile['jurusan']) ?></span>
                        </div>
                    </div>
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">💼</span>
                        <div>
                            <span class="bio-detail-label">Keahlian Utama</span>
                            <span class="bio-detail-value"><?= htmlspecialchars($profile['keahlian_utama']) ?></span>
                        </div>
                    </div>
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">🌐</span>
                        <div>
                            <span class="bio-detail-label">Bahasa</span>
                            <span class="bio-detail-value"><?= implode(', ', array_map('htmlspecialchars', $profile['bahasa'])) ?></span>
                        </div>
                    </div>
                    <div class="bio-detail-item">
                        <span class="bio-detail-icon">✉️</span>
                        <div>
                            <span class="bio-detail-label">Email</span>
                            <span class="bio-detail-value">
                                <a href="mailto:<?= htmlspecialchars($profile['kontak']['email']) ?>" class="inline-link">
                                    <?= htmlspecialchars($profile['kontak']['email']) ?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA Button -->
                <a href="#contact" class="btn btn-primary btn-sm" style="margin-top:1.5rem;" aria-label="Hubungi Saya">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    <span>Hubungi Saya</span>
                </a>
            </div><!-- /.about-bio-card -->

            <!-- Right Column -->
            <div class="about-right fade-in-right">

                <!-- Pengalaman Kerja -->
                <div class="glass-card experience-card">
                    <div class="card-glow" style="--glow-color: #00f2fe;" aria-hidden="true"></div>
                    <h3 class="card-title">
                        <span class="card-icon">💼</span> Pengalaman & Aktivitas
                    </h3>
                    <div class="timeline">
                        <?php foreach ($profile['experiences'] as $i => $exp): ?>
                            <div class="timeline-item">
                                <div class="timeline-dot" aria-hidden="true"></div>
                                <?php if ($i < count($profile['experiences']) - 1): ?>
                                    <div class="timeline-line" aria-hidden="true"></div>
                                <?php endif; ?>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-position"><?= htmlspecialchars($exp['posisi']) ?></span>
                                        <span class="timeline-period"><?= htmlspecialchars($exp['periode']) ?></span>
                                    </div>
                                    <span class="timeline-company"><?= htmlspecialchars($exp['perusahaan']) ?></span>
                                    <p class="timeline-desc"><?= htmlspecialchars($exp['deskripsi']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div><!-- /.experience-card -->

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <?php foreach ($profile['stats'] as $stat): ?>
                        <div class="glass-card stat-card fade-in-up">
                            <span class="stat-card-icon"><?= $stat['icon'] ?></span>
                            <span class="stat-card-value gradient-text"><?= htmlspecialchars($stat['value']) ?></span>
                            <span class="stat-card-label"><?= htmlspecialchars($stat['label']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div><!-- /.stats-grid -->

            </div><!-- /.about-right -->

        </div><!-- /.about-grid -->
    </div><!-- /.section-container -->
</section><!-- /#about -->


<!-- ╔══════════════════════════════════════════════════════╗
     ║  SECTION 3 — PROJECTS / EXPERIENCE                   ║
     ╚══════════════════════════════════════════════════════╝ -->
<section class="projects-section" id="projects" aria-label="Proyek dan Portofolio">
    <div class="section-container">

        <!-- Section Header -->
        <div class="section-header fade-in-up">
            <span class="section-tag">// Portofolio & Karya</span>
            <h2 class="section-title">Karya & <span class="gradient-text">Proyek</span></h2>
            <p class="section-subtitle">Koleksi pencapaian esports, video editing, desain gambar, dan karya seni menggambar.</p>
        </div>

        <?php
        // Ambil kategori unik secara dinamis
        $categories = array_unique(array_column($profile['projects'], 'kategori'));
        ?>
        <!-- Project Filter Tabs -->
        <div class="project-filters fade-in-up" role="tablist" aria-label="Filter Proyek">
            <button class="filter-btn active" data-filter="all" role="tab" aria-selected="true">Semua</button>
            <?php foreach ($categories as $cat): ?>
                <button class="filter-btn" data-filter="<?= htmlspecialchars($cat) ?>" role="tab" aria-selected="false"><?= htmlspecialchars($cat) ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid" id="projectsGrid">
            <?php foreach ($profile['projects'] as $i => $project): ?>
                <article class="project-card glass-card fade-in-up tilt-card"
                         data-delay="<?= $i * 100 ?>"
                         data-category="<?= htmlspecialchars($project['kategori']) ?>"
                         aria-label="Proyek: <?= htmlspecialchars($project['judul']) ?>">

                    <!-- Gradient Header -->
                    <div class="project-card-header" style="background: <?= htmlspecialchars($project['gradient']) ?>;" aria-hidden="true">
                        <span class="project-icon"><?= $project['icon'] ?></span>
                        <div class="project-header-glow" aria-hidden="true"></div>
                    </div>

                    <div class="project-card-body">
                        <!-- Meta -->
                        <div class="project-meta">
                            <span class="project-category"><?= htmlspecialchars($project['kategori']) ?></span>
                            <span class="project-year"><?= htmlspecialchars($project['tahun'] ?? '') ?></span>
                        </div>

                        <h3 class="project-title"><?= htmlspecialchars($project['judul']) ?></h3>
                        <p class="project-desc"><?= htmlspecialchars($project['deskripsi']) ?></p>

                        <!-- Tech Stack Tags -->
                        <div class="project-tech-stack" aria-label="Tags keahlian">
                            <?php foreach ($project['tech'] as $tech): ?>
                                <span class="tech-pill"><?= htmlspecialchars($tech) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Action Links -->
                        <div class="project-actions">
                            <?php 
                            $projectUrl  = $project['url'] ?? '#';
                            $projectRepo = $project['repo'] ?? '#';
                            ?>
                            <?php if ($projectUrl !== '#'): ?>
                                <a href="<?= htmlspecialchars($projectUrl) ?>"
                                   target="_blank" rel="noopener noreferrer"
                                   class="btn btn-sm btn-primary"
                                   aria-label="Lihat detail <?= htmlspecialchars($project['judul']) ?>">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                    Lihat Karya
                                </a>
                            <?php else: ?>
                                <span class="btn btn-sm btn-outline" style="border-color: rgba(255,255,255,0.15); color: var(--text-secondary);">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    Aktif & Berkarya
                                </span>
                            <?php endif; ?>
                        </div>

                    </div><!-- /.project-card-body -->
                </article>
            <?php endforeach; ?>
        </div><!-- /.projects-grid -->

    </div><!-- /.section-container -->
</section><!-- /#projects -->


<!-- ╔══════════════════════════════════════════════════════╗
     ║  SECTION 4 — SKILLS                                  ║
     ╚══════════════════════════════════════════════════════╝ -->
<section class="skills-section" id="skills" aria-label="Keahlian">
    <div class="section-container">

        <!-- Section Header -->
        <div class="section-header fade-in-up">
            <span class="section-tag">// Keahlian Utama</span>
            <h2 class="section-title">Keahlian & <span class="gradient-text">Tools</span></h2>
            <p class="section-subtitle">Game yang dikuasai, software editing video, desain gambar, dan tools menggambar digital.</p>
        </div>

        <div class="skills-layout">

            <!-- Skill Bars (kiri) -->
            <div class="skill-bars-wrap fade-in-left">
                <h3 class="skill-group-title">Tingkat Penguasaan</h3>
                <?php foreach ($profile['skills'] as $skill): ?>
                    <div class="skill-bar-item"
                         data-level="<?= (int)$skill['level'] ?>"
                         data-color="<?= htmlspecialchars($skill['color']) ?>">
                        <div class="skill-bar-header">
                            <span class="skill-bar-name"><?= htmlspecialchars($skill['name']) ?></span>
                            <span class="skill-bar-percent" style="color: <?= htmlspecialchars($skill['color']) ?>;">
                                <?= (int)$skill['level'] ?>%
                            </span>
                        </div>
                        <div class="skill-bar-track" role="progressbar"
                             aria-valuenow="<?= (int)$skill['level'] ?>"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-label="<?= htmlspecialchars($skill['name']) ?> — <?= (int)$skill['level'] ?>%">
                            <div class="skill-bar-fill"
                                 style="--target-width: <?= (int)$skill['level'] ?>%; --bar-color: <?= htmlspecialchars($skill['color']) ?>;">
                                <div class="skill-bar-glow" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!-- /.skill-bars-wrap -->

            <!-- Tech Tags Cloud (kanan) -->
            <div class="tech-tags-wrap fade-in-right">
                <h3 class="skill-group-title">Tags & Software</h3>
                <div class="tech-tags-cloud" role="list" aria-label="Daftar teknologi">
                    <?php
                    $tagColors = [
                        'linear-gradient(135deg,#7F00FF,#E100FF)',
                        'linear-gradient(135deg,#00f2fe,#4facfe)',
                        'linear-gradient(135deg,#ff0844,#ffb199)',
                        'linear-gradient(135deg,#f7971e,#ffd200)',
                        'linear-gradient(135deg,#11998e,#38ef7d)',
                        'linear-gradient(135deg,#f093fb,#f5576c)',
                        'linear-gradient(135deg,#4facfe,#00f2fe)',
                        'linear-gradient(135deg,#43e97b,#38f9d7)',
                    ];
                    foreach ($profile['tech_tags'] as $i => $tag):
                        $grad = $tagColors[$i % count($tagColors)];
                    ?>
                        <span class="tech-tag" role="listitem"
                              style="--tag-gradient: <?= htmlspecialchars($grad) ?>;">
                            <?= htmlspecialchars($tag) ?>
                        </span>
                    <?php endforeach; ?>
                </div><!-- /.tech-tags-cloud -->

                <!-- Radar Chart Placeholder -->
                <div class="glass-card radar-card">
                    <div class="card-glow" style="--glow-color: #E100FF;" aria-hidden="true"></div>
                    <h4 class="radar-title">Fokus Keahlian</h4>
                    <div class="radar-legend">
                        <?php
                        $focuses = [
                            ['label'=>'MLBB Gameplay', 'pct'=>95, 'color'=>'#00f2fe'],
                            ['label'=>'Video Editing', 'pct'=>90, 'color'=>'#7F00FF'],
                            ['label'=>'Image Editing', 'pct'=>88, 'color'=>'#ff0844'],
                            ['label'=>'Menggambar',    'pct'=>85, 'color'=>'#E100FF'],
                            ['label'=>'Kreativitas',   'pct'=>92, 'color'=>'#38ef7d'],
                        ];
                        foreach ($focuses as $f):
                        ?>
                            <div class="radar-item">
                                <span class="radar-label"><?= $f['label'] ?></span>
                                <div class="radar-bar-track">
                                    <div class="radar-bar-fill"
                                         style="--target-width: <?= $f['pct'] ?>%; --bar-color: <?= $f['color'] ?>;">
                                    </div>
                                </div>
                                <span class="radar-pct" style="color:<?= $f['color'] ?>;"><?= $f['pct'] ?>%</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div><!-- /.radar-card -->

            </div><!-- /.tech-tags-wrap -->

        </div><!-- /.skills-layout -->

    </div><!-- /.section-container -->
</section><!-- /#skills -->


<!-- ╔══════════════════════════════════════════════════════╗
     ║  SECTION 5 — CONTACT & SOCIALS                       ║
     ╚══════════════════════════════════════════════════════╝ -->
<section class="contact-section" id="contact" aria-label="Kontak">
    <div class="section-container">

        <!-- Section Header -->
        <div class="section-header fade-in-up">
            <span class="section-tag">// Kontak</span>
            <h2 class="section-title">Ayo <span class="gradient-text">Terhubung!</span></h2>
            <p class="section-subtitle">Ada ide, kolaborasi, atau peluang menarik? Saya siap mendengarnya.</p>
        </div>

        <div class="contact-grid">

            <!-- Info Kontak (kiri) -->
            <div class="contact-info fade-in-left">

                <div class="glass-card contact-info-card">
                    <div class="card-glow" style="--glow-color: #00f2fe;" aria-hidden="true"></div>
                    <h3 class="card-title">
                        <span class="card-icon">📬</span> Informasi Kontak
                    </h3>

                    <div class="contact-detail-list">
                        <a href="mailto:<?= htmlspecialchars($profile['kontak']['email']) ?>"
                           class="contact-detail-item hover-lift"
                           aria-label="Email: <?= htmlspecialchars($profile['kontak']['email']) ?>">
                            <div class="contact-detail-icon-wrap" style="background: linear-gradient(135deg,#7F00FF,#E100FF);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                            </div>
                            <div>
                                <span class="contact-detail-label">Email</span>
                                <span class="contact-detail-value"><?= htmlspecialchars($profile['kontak']['email']) ?></span>
                            </div>
                        </a>

                        <a href="https://wa.me/<?= htmlspecialchars($profile['kontak']['whatsapp']) ?>"
                           target="_blank" rel="noopener noreferrer"
                           class="contact-detail-item hover-lift"
                           aria-label="WhatsApp: <?= htmlspecialchars($profile['kontak']['telepon']) ?>">
                            <div class="contact-detail-icon-wrap" style="background: linear-gradient(135deg,#25D366,#128C7E);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.553 4.104 1.523 5.829L.057 23.428a.75.75 0 00.916.919l5.671-1.473A11.937 11.937 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75c-1.95 0-3.77-.528-5.33-1.444l-.376-.224-3.909 1.015 1.039-3.795-.245-.389A9.714 9.714 0 012.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/></svg>
                            </div>
                            <div>
                                <span class="contact-detail-label">WhatsApp</span>
                                <span class="contact-detail-value"><?= htmlspecialchars($profile['kontak']['telepon']) ?></span>
                            </div>
                        </a>

                        <div class="contact-detail-item">
                            <div class="contact-detail-icon-wrap" style="background: linear-gradient(135deg,#ff0844,#ffb199);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <span class="contact-detail-label">Lokasi</span>
                                <span class="contact-detail-value"><?= htmlspecialchars($profile['kontak']['lokasi']) ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.contact-info-card -->

                <!-- Sosial Media Grid -->
                <div class="social-media-grid" aria-label="Media Sosial">
                    <?php foreach ($profile['socials'] as $social): ?>
                        <a href="<?= htmlspecialchars($social['url']) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-card glass-card hover-lift"
                           style="--social-gradient: <?= htmlspecialchars($social['gradient']) ?>;"
                           aria-label="Kunjungi <?= htmlspecialchars($social['nama']) ?>">
                            <div class="social-card-icon-wrap" style="background: <?= htmlspecialchars($social['gradient']) ?>;">
                                <?php
                                // Inline SVG icons untuk sosial media
                                switch ($social['icon']) {
                                    case 'github':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>';
                                        break;
                                    case 'linkedin':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>';
                                        break;
                                    case 'instagram':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>';
                                        break;
                                    case 'twitter':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>';
                                        break;
                                    case 'youtube':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>';
                                        break;
                                    case 'dribbble':
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"/></svg>';
                                        break;
                                    default:
                                        echo '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>';
                                }
                                ?>
                            </div>
                            <span class="social-card-name"><?= htmlspecialchars($social['nama']) ?></span>
                            <svg class="social-card-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    <?php endforeach; ?>
                </div><!-- /.social-media-grid -->

            </div><!-- /.contact-info -->

            <!-- Form Kontak (kanan) -->
            <div class="contact-form-wrap fade-in-right">
                <div class="glass-card contact-form-card">
                    <div class="card-glow" style="--glow-color: #7F00FF;" aria-hidden="true"></div>
                    <h3 class="card-title">
                        <span class="card-icon">✍️</span> Kirim Pesan
                    </h3>
                    <p class="form-subtitle">Isi form di bawah — saya biasanya membalas dalam 1×24 jam.</p>

                    <form class="contact-form" id="contactForm" novalidate aria-label="Form Kontak">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="cf-name" class="form-label">Nama Lengkap</label>
                                <div class="input-wrap">
                                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    <input type="text" id="cf-name" name="name" class="form-input" placeholder="Nama Anda" required autocomplete="name" />
                                </div>
                                <span class="form-error" role="alert" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="cf-email" class="form-label">Alamat Email</label>
                                <div class="input-wrap">
                                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                                    <input type="email" id="cf-email" name="email" class="form-input" placeholder="email@contoh.com" required autocomplete="email" />
                                </div>
                                <span class="form-error" role="alert" id="emailError"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cf-subject" class="form-label">Subjek</label>
                            <div class="input-wrap">
                                <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                                <input type="text" id="cf-subject" name="subject" class="form-input" placeholder="Topik pesan Anda" required />
                            </div>
                            <span class="form-error" role="alert" id="subjectError"></span>
                        </div>

                        <div class="form-group">
                            <label for="cf-message" class="form-label">Pesan</label>
                            <div class="input-wrap textarea-wrap">
                                <svg class="input-icon textarea-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="17" y1="10" x2="3" y2="10"/><line x1="21" y1="6" x2="3" y2="6"/><line x1="21" y1="14" x2="3" y2="14"/><line x1="17" y1="18" x2="3" y2="18"/></svg>
                                <textarea id="cf-message" name="message" class="form-input form-textarea" placeholder="Tulis pesan Anda di sini..." rows="5" required></textarea>
                            </div>
                            <span class="form-error" role="alert" id="messageError"></span>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full" id="submitBtn" aria-label="Kirim Pesan">
                            <span class="btn-text">Kirim Pesan</span>
                            <svg class="btn-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                            <span class="btn-loader" aria-hidden="true"></span>
                        </button>

                        <!-- Success / Error Message -->
                        <div class="form-feedback" id="formFeedback" role="alert" aria-live="polite"></div>

                    </form><!-- /.contact-form -->
                </div><!-- /.contact-form-card -->
            </div><!-- /.contact-form-wrap -->

        </div><!-- /.contact-grid -->

    </div><!-- /.section-container -->
</section><!-- /#contact -->

<?php
// ── Include Footer (membutuhkan $profile) ─────────────────────────────────────
require_once __DIR__ . '/includes/footer.php';
?>
