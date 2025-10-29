<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SIPASTI - Sistem Informasi Pengawasan dan Tindak Lanjut</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/home-new.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-file-alt"></i>
                    <span class="brand-text">SIPASTI</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="d-none d-md-flex align-items-center gap-3">
                    <ul class="navbar-nav">
                        <li><a href="#" class="nav-link">Home</a></li>
                        <li><a href="#features" class="nav-link">Fitur</a></li>
                        <li><a href="#about" class="nav-link">Tentang</a></li>
                    </ul>
                    <?php if (!session()->has('user_id')): ?>
                        <a href="/login" class="btn-login">
                            <i class="fas fa-lock"></i> <span>Masuk</span>
                        </a>
                    <?php else: ?>
                        <a href="/admin/menu" class="btn-login">
                            <i class="fas fa-user"></i> <span>Dashboard</span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn d-md-none" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <h2 style="margin: 0; color: white; font-weight: 800;">Menu</h2>
            <button class="mobile-menu-close" id="mobileMenuClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav">
            <li><a href="#" class="nav-link">Home</a></li>
            <li><a href="#features" class="nav-link">Fitur</a></li>
            <li><a href="#about" class="nav-link">Tentang</a></li>
            <li>
                <?php if (!session()->has('user_id')): ?>
                    <a href="/login" class="nav-link">
                        <i class="fas fa-lock"></i> Masuk
                    </a>
                <?php else: ?>
                    <a href="/admin/menu" class="nav-link">
                        <i class="fas fa-user"></i> Dashboard
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="pattern-layer"></div>
        <div class="hero-background"></div>

        <!-- Animated Lines -->
        <div class="animated-lines">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
            <div class="line line-4"></div>
        </div>

        <!-- Floating Elements -->
        <div class="floating-element floating-left d-none d-lg-block">
            <div class="text-center">
                <i style="font-size: 2.5rem; margin-bottom: 0.5rem;" class="fa-solid fa-book"></i>
                <div style="font-weight: 700; font-size: 1.2rem;">Pengawasan</div>
                <!-- <div style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">SIPASTI</div> -->
            </div>
        </div>
        <div class="floating-element floating-right d-none d-lg-block">
            <div class="text-center">
                <i style="font-size: 2.5rem; margin-bottom: 0.5rem;" class="fa-solid fa-shield-halved"></i>
                <div style="font-weight: 700; font-size: 1.2rem;">Tindak Lanjut</div>
                <!-- <div style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">SIPASTI</div> -->
            </div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-sparkles"></i> Portal Resmi SIPASTI
            </div>
            <h1 class="hero-title">
                Portal <span class="hero-title-highlight">Sipasti</span>
            </h1>
            <p class="hero-description">
                Sistem Informasi Pengawasan dan Tindak Lanjut
            </p>
            <!-- <div class="hero-buttons">
                <button class="btn btn-primary-glow" onclick="window.location.href='/app'">
                    Buka Aplikasi <i class="fas fa-arrow-right ms-2"></i>
                </button>
                <button class="btn btn-outline-white" onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})">
                    Pelajari Lebih Lanjut
                </button>
            </div> -->
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-title-highlight">Fitur Utama</span>
                </h2>
                <p class="section-subtitle">
                    Solusi lengkap untuk pengawasan dan akuntabilitas
                </p>
            </div>

            <div class="feature-grid">
                <?php if (isset($menus) && !empty($menus)): ?>
                    <?php foreach ($menus as $menu): ?>
                        <a href="<?= $menu['link'] ?>" class="feature-card">
                            <div class="feature-icon">
                                <img src="<?= $menu['icon'] ?>?v=<?= $cache_buster ?? time() ?>" alt="<?= $menu['name'] ?>">
                            </div>
                            <h3 class="feature-title"><?= $menu['name'] ?></h3>
                            <p class="feature-description">
                                Klik untuk mengakses layanan <?= strtolower($menu['name']) ?>
                            </p>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default Features -->
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-invoice" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Temuan & Tindaklanjut</h3>
                        <p class="feature-description">
                            Sistem pencatatan dan pengelolaan temuan audit serta tindak lanjutnya
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">e-Pengawasan</h3>
                        <p class="feature-description">
                            Platform pengawasan digital yang terintegrasi dan real-time
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">e-Penugasan</h3>
                        <p class="feature-description">
                            Manajemen penugasan dan monitoring pelaksanaan tugas
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Jaminan Mutu & Konsultasi</h3>
                        <p class="feature-description">
                            Layanan konsultasi dan jaminan mutu yang profesional
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Manajemen Tim</h3>
                        <p class="feature-description">
                            Koordinasi dan kolaborasi tim yang efektif
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Perpustakaan Digital</h3>
                        <p class="feature-description">
                            Akses dokumen dan referensi yang komprehensif
                        </p>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" style="padding: 6rem 2rem; background: rgba(139, 92, 246, 0.05);">
        <div class="container" style="max-width: 1200px;">
            <div class="text-center" style="margin-bottom: 3rem;">
                <div style="color: #c084fc; font-weight: 600; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">
                    <span>//</span> Tentang SiPasti
                </div>
                <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 2rem;">
                    Sistem Informasi<span style="display: block; -webkit-background-clip: text;">Pengawasan dan Tindak Lanjut</span>
                </h1>
                <p style="font-size: 1.25rem; max-width: 800px; margin: 0 auto; line-height: 1.8;">
                    Merupakan Sistem Informasi yang menunjang kinerja pengawasan yang dilakukan oleh Para Auditor Inspektorat, serta merupakan sebuah sistem tindak lanjut bagi OPD yang menjadi sasaran pengawasan/pemeriksaan.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background: rgba(26, 11, 46, 0.9); border-top: 1px solid rgba(139, 92, 246, 0.2); padding: 2rem 0;">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap; gap: 2rem;">
                <div>
                    <p style="margin: 0; color: rgba(255, 255, 255, 0.7);">
                        <a href="#" style="color: #c084fc; text-decoration: none; font-weight: 700;">SIPASTI</a> -
                        Sistem Informasi Pengawasan dan Tindak Lanjut
                    </p>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <a href="https://www.facebook.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.behance.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-behance"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ToTop Button -->
    <div id="toTop" style="position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px; background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4); transition: all 0.3s; z-index: 999; opacity: 0; visibility: hidden;">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const mobileMenuClose = document.getElementById('mobileMenuClose');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openMobileMenu);
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }

        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.mobile-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const toTop = document.getElementById('toTop');

            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(26, 11, 46, 0.95)';
            } else {
                navbar.style.background = 'rgba(26, 11, 46, 0.8)';
            }

            // Show/hide ToTop button
            if (toTop) {
                if (window.scrollY > 300) {
                    toTop.style.opacity = '1';
                    toTop.style.visibility = 'visible';
                } else {
                    toTop.style.opacity = '0';
                    toTop.style.visibility = 'hidden';
                }
            }
        });

        // ToTop button functionality
        document.getElementById('toTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Social media icon hover effect
        document.querySelectorAll('footer a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)';
                this.style.borderColor = '#c084fc';
                this.style.color = 'white';
                this.style.transform = 'translateY(-3px)';
            });
            link.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(139, 92, 246, 0.2)';
                this.style.borderColor = 'rgba(139, 92, 246, 0.3)';
                this.style.color = '#c084fc';
                this.style.transform = 'translateY(0)';
            });
        });
    </script>

    <!-- Pattern Layer -->
    <script>
        document.addEventListener("mousemove", function(e) {
            const pattern = document.querySelector(".pattern-layer");
            const x = (e.clientX / window.innerWidth) * 30;
            const y = (e.clientY / window.innerHeight) * 30;
            pattern.style.backgroundPosition = `${x}px ${y}px`;
        });
    </script>
</body>

</html>