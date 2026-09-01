/**
 * main.js — Vibrant Neo-Modern Portfolio
 * Efek interaktif: Custom Cursor, Typing Effect, Scroll Animations,
 * Skill Bars, Project Filter, 3D Tilt, Particle, Form Validation.
 */

'use strict';

/* ═══════════════════════════════════════════════════════════════════
   1. CUSTOM ANIMATED CURSOR
   ═══════════════════════════════════════════════════════════════════ */
(function initCursor() {
    const dot   = document.getElementById('cursorDot');
    const ring  = document.getElementById('cursorRing');
    if (!dot || !ring) return;

    let mouseX = 0, mouseY = 0;
    let ringX  = 0, ringY  = 0;
    let raf;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        // Dot follows immediately
        dot.style.left = mouseX + 'px';
        dot.style.top  = mouseY + 'px';
    });

    // Ring lags behind (trailing effect)
    function animateRing() {
        ringX += (mouseX - ringX) * 0.1;
        ringY += (mouseY - ringY) * 0.1;
        ring.style.left = ringX + 'px';
        ring.style.top  = ringY + 'px';
        raf = requestAnimationFrame(animateRing);
    }
    raf = requestAnimationFrame(animateRing);

    // Change appearance on interactive elements
    const interactiveEls = document.querySelectorAll(
        'a, button, input, textarea, select, [role="tab"], .tech-tag, .social-card'
    );
    interactiveEls.forEach(el => {
        el.addEventListener('mouseenter', () => {
            dot.style.transform  = 'translate(-50%, -50%) scale(1.8)';
            ring.style.transform = 'translate(-50%, -50%) scale(1.5)';
            ring.style.borderColor = 'rgba(0,242,254,0.8)';
        });
        el.addEventListener('mouseleave', () => {
            dot.style.transform  = 'translate(-50%, -50%) scale(1)';
            ring.style.transform = 'translate(-50%, -50%) scale(1)';
            ring.style.borderColor = 'rgba(127,0,255,0.6)';
        });
    });

    // Hide on leave, show on enter
    document.addEventListener('mouseleave', () => {
        dot.style.opacity  = '0';
        ring.style.opacity = '0';
    });
    document.addEventListener('mouseenter', () => {
        dot.style.opacity  = '1';
        ring.style.opacity = '1';
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   2. TYPING EFFECT (Hero Tagline)
   ═══════════════════════════════════════════════════════════════════ */
(function initTyping() {
    const el = document.getElementById('typingText');
    if (!el) return;

    const words = [
        'Pelajar SMPIP Al-Imam',
        'TO THE DREAM',
        'Video Editor & Montage Maker',
        'Image & Graphic Designer',
        'Digital Artist (Menggambar)',
        'EXP Laner & Roamer',
        'Creative Content Creator',
    ];

    let wordIndex   = 0;
    let charIndex   = 0;
    let isDeleting  = false;
    let typeSpeed   = 80;
    let deleteSpeed = 45;
    let pauseAfterWord  = 1800;
    let pauseBeforeType = 500;

    function type() {
        const currentWord = words[wordIndex];

        if (!isDeleting) {
            // Typing
            el.textContent = currentWord.slice(0, charIndex + 1);
            charIndex++;
            if (charIndex === currentWord.length) {
                // Finished typing this word — pause then start deleting
                isDeleting = true;
                setTimeout(type, pauseAfterWord);
                return;
            }
            setTimeout(type, typeSpeed);
        } else {
            // Deleting
            el.textContent = currentWord.slice(0, charIndex - 1);
            charIndex--;
            if (charIndex === 0) {
                isDeleting = false;
                wordIndex  = (wordIndex + 1) % words.length;
                setTimeout(type, pauseBeforeType);
                return;
            }
            setTimeout(type, deleteSpeed);
        }
    }

    setTimeout(type, 800);
})();


/* ═══════════════════════════════════════════════════════════════════
   3. SCROLL-TRIGGERED FADE-IN (Intersection Observer)
   ═══════════════════════════════════════════════════════════════════ */
(function initScrollAnimations() {
    const fadeEls = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = parseInt(entry.target.dataset.delay || '0', 10);
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px',
    });

    fadeEls.forEach(el => observer.observe(el));
})();


/* ═══════════════════════════════════════════════════════════════════
   4. ANIMATED SKILL BARS (trigger on scroll)
   ═══════════════════════════════════════════════════════════════════ */
(function initSkillBars() {
    const bars = document.querySelectorAll('.skill-bar-fill, .radar-bar-fill');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Small delay for dramatic reveal
                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, 200);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    bars.forEach(bar => observer.observe(bar));
})();


/* ═══════════════════════════════════════════════════════════════════
   5. NAVBAR — scroll state & active section tracking
   ═══════════════════════════════════════════════════════════════════ */
(function initNavbar() {
    const navbar     = document.getElementById('navbar');
    const navLinks   = document.querySelectorAll('.nav-link');
    const hamburger  = document.getElementById('hamburger');
    const navMenu    = document.getElementById('navLinks');
    const sections   = document.querySelectorAll('section[id]');

    if (!navbar) return;

    // Scroll state (add class when scrolled)
    const onScroll = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Active link tracking
        let current = '';
        sections.forEach(section => {
            const top = section.offsetTop - 120;
            if (window.scrollY >= top) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.dataset.section === current) {
                link.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // Smooth scroll for nav links
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Close mobile menu
                if (navMenu) navMenu.classList.remove('open');
                if (hamburger) hamburger.classList.remove('open');
                hamburger?.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // Hamburger mobile menu
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            const isOpen = navMenu.classList.toggle('open');
            hamburger.classList.toggle('open', isOpen);
            hamburger.setAttribute('aria-expanded', String(isOpen));
        });
        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!navbar.contains(e.target)) {
                navMenu.classList.remove('open');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            }
        });
    }
})();


/* ═══════════════════════════════════════════════════════════════════
   6. SCROLL TO TOP BUTTON
   ═══════════════════════════════════════════════════════════════════ */
(function initScrollTop() {
    const btn = document.getElementById('scrollTop');
    if (!btn) return;

    window.addEventListener('scroll', () => {
        btn.classList.toggle('visible', window.scrollY > 500);
    }, { passive: true });

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   7. PROJECT FILTER TABS
   ═══════════════════════════════════════════════════════════════════ */
(function initProjectFilter() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards      = document.querySelectorAll('.project-card[data-category]');

    if (!filterBtns.length || !cards.length) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');

            const filter = btn.dataset.filter;

            cards.forEach((card, i) => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.classList.remove('hidden');
                    // Re-animate cards that are shown
                    card.style.transitionDelay = (i * 60) + 'ms';
                    card.classList.remove('visible');
                    setTimeout(() => card.classList.add('visible'), 10);
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   8. 3D TILT EFFECT on Project Cards
   ═══════════════════════════════════════════════════════════════════ */
(function initTiltEffect() {
    const tiltCards = document.querySelectorAll('.tilt-card');
    if (!tiltCards.length) return;

    const MAX_TILT    = 10;   // degrees
    const PERSPECTIVE = 1000; // px

    tiltCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x    = e.clientX - rect.left;
            const y    = e.clientY - rect.top;
            const cx   = rect.width  / 2;
            const cy   = rect.height / 2;

            const rotateX = ((y - cy) / cy) * -MAX_TILT;
            const rotateY = ((x - cx) / cx) *  MAX_TILT;

            card.style.transform = `
                perspective(${PERSPECTIVE}px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                translateZ(10px)
                scale(1.02)
            `;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.transition = 'transform 0.5s cubic-bezier(0.4,0,0.2,1)';
            setTimeout(() => { card.style.transition = ''; }, 500);
        });

        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.1s linear';
        });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   9. HERO PARTICLE DOTS (decorative background dots)
   ═══════════════════════════════════════════════════════════════════ */
(function initParticles() {
    const container = document.getElementById('heroParticles');
    if (!container) return;

    const COUNT  = 55;
    const COLORS = ['#7F00FF', '#00f2fe', '#ff0844', '#E100FF', '#f7971e', '#4facfe'];

    for (let i = 0; i < COUNT; i++) {
        const p = document.createElement('div');
        p.className = 'particle';

        const size  = Math.random() * 3 + 1.5;
        const x     = Math.random() * 100;
        const y     = Math.random() * 100;
        const dur   = (Math.random() * 6 + 4).toFixed(2);
        const delay = (Math.random() * 6).toFixed(2);
        const color = COLORS[Math.floor(Math.random() * COLORS.length)];

        Object.assign(p.style, {
            width:                   size + 'px',
            height:                  size + 'px',
            left:                    x + '%',
            top:                     y + '%',
            background:              color,
            boxShadow:               `0 0 ${size * 3}px ${color}`,
            animationDuration:       dur + 's',
            animationDelay:          delay + 's',
        });

        container.appendChild(p);
    }
})();


/* ═══════════════════════════════════════════════════════════════════
   10. CONTACT FORM — Validation & Submission
   ═══════════════════════════════════════════════════════════════════ */
(function initContactForm() {
    const form     = document.getElementById('contactForm');
    const feedback = document.getElementById('formFeedback');
    if (!form) return;

    const fields = {
        name   : { el: document.getElementById('cf-name'),    err: document.getElementById('nameError'),    label: 'Nama' },
        email  : { el: document.getElementById('cf-email'),   err: document.getElementById('emailError'),   label: 'Email' },
        subject: { el: document.getElementById('cf-subject'), err: document.getElementById('subjectError'), label: 'Subjek' },
        message: { el: document.getElementById('cf-message'), err: document.getElementById('messageError'), label: 'Pesan' },
    };

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function showError(field, message) {
        if (!field.err) return;
        field.err.textContent = message;
        field.el?.setAttribute('aria-invalid', 'true');
        field.el?.closest('.input-wrap')?.classList.add('error-state');
    }

    function clearError(field) {
        if (!field.err) return;
        field.err.textContent = '';
        field.el?.removeAttribute('aria-invalid');
        field.el?.closest('.input-wrap')?.classList.remove('error-state');
    }

    function validateAll() {
        let valid = true;

        // Name
        if (!fields.name.el?.value.trim()) {
            showError(fields.name, 'Nama tidak boleh kosong.');
            valid = false;
        } else if (fields.name.el.value.trim().length < 2) {
            showError(fields.name, 'Nama minimal 2 karakter.');
            valid = false;
        } else { clearError(fields.name); }

        // Email
        if (!fields.email.el?.value.trim()) {
            showError(fields.email, 'Email tidak boleh kosong.');
            valid = false;
        } else if (!validateEmail(fields.email.el.value.trim())) {
            showError(fields.email, 'Format email tidak valid.');
            valid = false;
        } else { clearError(fields.email); }

        // Subject
        if (!fields.subject.el?.value.trim()) {
            showError(fields.subject, 'Subjek tidak boleh kosong.');
            valid = false;
        } else { clearError(fields.subject); }

        // Message
        if (!fields.message.el?.value.trim()) {
            showError(fields.message, 'Pesan tidak boleh kosong.');
            valid = false;
        } else if (fields.message.el.value.trim().length < 10) {
            showError(fields.message, 'Pesan minimal 10 karakter.');
            valid = false;
        } else { clearError(fields.message); }

        return valid;
    }

    // Real-time validation on blur
    Object.values(fields).forEach(field => {
        field.el?.addEventListener('blur', validateAll);
        field.el?.addEventListener('input', () => clearError(field));
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!validateAll()) return;

        const submitBtn = document.getElementById('submitBtn');
        submitBtn?.classList.add('loading');

        // Simulate async send (replace with real fetch/AJAX)
        await new Promise(resolve => setTimeout(resolve, 1800));

        submitBtn?.classList.remove('loading');

        // Success (demo: always succeed)
        if (feedback) {
            feedback.textContent = '🎉 Pesan berhasil dikirim! Saya akan membalas secepatnya.';
            feedback.className   = 'form-feedback success';
            setTimeout(() => {
                feedback.className = 'form-feedback';
                feedback.textContent = '';
            }, 5000);
        }
        form.reset();
        Object.values(fields).forEach(f => clearError(f));
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   11. SMOOTH SCROLL for all anchor links
   ═══════════════════════════════════════════════════════════════════ */
(function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (href === '#') { e.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); return; }
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   12. NAVBAR LOGO — first word detection fix
   ═══════════════════════════════════════════════════════════════════ */
(function initNavAnchorLinks() {
    // Ensure logo scrolls to top
    document.querySelector('.nav-logo')?.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   13. FOOTER SOCIAL ICONS — ensure icon wrapper SVG is present
       (fallback: footer.php loads icons inline; this just verifies)
   ═══════════════════════════════════════════════════════════════════ */
(function patchMissingFooterIcons() {
    // If footer social links have no SVG child, they still render text — fine.
    // This function intentionally left minimal.
})();


/* ═══════════════════════════════════════════════════════════════════
   14. DYNAMIC NEON BORDER GLOW on glass cards (mouse position based)
   ═══════════════════════════════════════════════════════════════════ */
(function initNeonGlow() {
    const glassCards = document.querySelectorAll('.glass-card');

    glassCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width)  * 100;
            const y = ((e.clientY - rect.top)  / rect.height) * 100;

            card.style.setProperty('--mouse-x', x + '%');
            card.style.setProperty('--mouse-y', y + '%');
            card.style.background = `
                radial-gradient(
                    circle at ${x}% ${y}%,
                    rgba(127, 0, 255, 0.09) 0%,
                    rgba(255,255,255,0.03) 60%
                )
            `;
        });

        card.addEventListener('mouseleave', () => {
            card.style.background = '';
        });
    });
})();


/* ═══════════════════════════════════════════════════════════════════
   15. COUNTER ANIMATION for stat values (e.g. "50+" counts up)
   ═══════════════════════════════════════════════════════════════════ */
(function initCounterAnimation() {
    const statValues = document.querySelectorAll('.stat-card-value, .stat-value');

    function extractNumber(str) {
        const match = str.match(/(\d+)/);
        return match ? parseInt(match[1], 10) : 0;
    }
    function getSuffix(str) {
        return str.replace(/[\d]/g, '');
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el       = entry.target;
            const original = el.textContent;
            const target   = extractNumber(original);
            const suffix   = getSuffix(original);
            if (target === 0) return;

            let start     = 0;
            const dur     = 1500;
            const step    = 16;
            const steps   = dur / step;
            const inc     = target / steps;
            let current   = 0;

            const timer = setInterval(() => {
                current += inc;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                el.textContent = Math.floor(current) + suffix;
            }, step);

            observer.unobserve(el);
        });
    }, { threshold: 0.5 });

    statValues.forEach(el => observer.observe(el));
})();


/* ═══════════════════════════════════════════════════════════════════
   16. TECH TAG random entry animation
   ═══════════════════════════════════════════════════════════════════ */
(function initTechTagsReveal() {
    const tags = document.querySelectorAll('.tech-tag');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            tags.forEach((tag, i) => {
                setTimeout(() => {
                    tag.style.opacity   = '1';
                    tag.style.transform = 'translateY(0) scale(1)';
                }, i * 45);
            });
            observer.disconnect();
        });
    }, { threshold: 0.1 });

    // Initial state
    tags.forEach(tag => {
        tag.style.opacity   = '0';
        tag.style.transform = 'translateY(12px) scale(0.9)';
        tag.style.transition = 'opacity 0.4s ease, transform 0.4s cubic-bezier(0.34,1.56,0.64,1)';
    });

    const container = document.querySelector('.tech-tags-cloud');
    if (container) observer.observe(container);
})();
