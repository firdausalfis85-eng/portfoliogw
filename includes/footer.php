<?php
/**
 * footer.php
 * Berisi footer bar, copyright, quick links, dan script JS.
 * $profile harus sudah tersedia sebelum include file ini.
 */
$currentYear = date('Y');
?>

    </main><!-- /#main-content -->

    <!-- ══════════════ FOOTER ══════════════ -->
    <footer class="site-footer" role="contentinfo">
        <div class="footer-container">

            <!-- Footer Brand -->
            <div class="footer-brand">
                <a href="#hero" class="footer-logo">
                    <span class="logo-bracket">&lt;</span>
                    <span class="logo-text gradient-text"><?= htmlspecialchars($profile['nama_lengkap']) ?></span>
                    <span class="logo-bracket">/&gt;</span>
                </a>
                <p class="footer-bio"><?= htmlspecialchars($profile['tagline']) ?></p>
            </div>

            <!-- Quick Links -->
            <div class="footer-links" role="navigation" aria-label="Footer Navigation">
                <h3 class="footer-heading">Quick Links</h3>
                <ul role="list">
                    <li><a href="#hero"     class="footer-link">Home</a></li>
                    <li><a href="#about"    class="footer-link">About</a></li>
                    <li><a href="#projects" class="footer-link">Projects</a></li>
                    <li><a href="#skills"   class="footer-link">Skills</a></li>
                    <li><a href="#contact"  class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Sosial Media -->
            <div class="footer-socials">
                <h3 class="footer-heading">Connect</h3>
                <div class="footer-social-grid">
                    <?php foreach ($profile['socials'] as $social): ?>
                        <a href="<?= htmlspecialchars($social['url']) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="footer-social-link"
                           aria-label="<?= htmlspecialchars($social['nama']) ?>"
                           style="background: <?= htmlspecialchars($social['gradient']) ?>;">
                            <?php
                            // Inline SVG icon berdasarkan nama platform
                            switch ($social['icon']) {
                                case 'github':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>';
                                    break;
                                case 'linkedin':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>';
                                    break;
                                case 'instagram':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>';
                                    break;
                                case 'twitter':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>';
                                    break;
                                case 'youtube':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>';
                                    break;
                                case 'dribbble':
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"/></svg>';
                                    break;
                                default:
                                    echo '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg>';
                            }
                            ?>
                            <span><?= htmlspecialchars($social['nama']) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div><!-- /.footer-container -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p class="footer-copy">
                    &copy; <?= $currentYear ?>
                    <span class="gradient-text"><?= htmlspecialchars($profile['nama_lengkap']) ?></span>.
                    Dibuat dengan <span class="heart" aria-label="cinta">❤️</span> menggunakan PHP Murni.
                </p>
                <p class="footer-credit">
                    Tema: <span class="gradient-text">Vibrant Neo-Modern</span>
                </p>
            </div>
        </div>

    </footer><!-- /.site-footer -->

    <!-- Scroll-to-top button -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll ke atas">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M18 15l-6-6-6 6"/>
        </svg>
    </button>

    <!-- Main JS -->
    <script src="assets/js/main.js?v=<?= time() ?>" defer></script>

</body>
</html>
