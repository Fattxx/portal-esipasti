<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SIPASTI - Sistem Informasi Pengawasan dan Tindak Lanjut</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* == PRELOADER CSS START == */
        #preloader {
          position: fixed;
          left: 0%;
          right: 0%;
          top: 0%;
          width: 100%;
          height: 100%;
          /* MODIFIKASI: Menyamakan background dengan body home.php */
          background: linear-gradient(135deg, #3d0145 0%, #bd21ff 100%); 
          display: flex;
          justify-content: center;
          align-items: center;
          /* MODIFIKASI: z-index tertinggi agar di atas menu mobile */
          z-index: 99999; 
          transition: all 1s ease;
          -moz-transition: all 1s ease;
          -ms-transition: all 1s ease;
          -o-transition: all 1s ease;
          -webkit-transition: all 1s ease;
        }

        #preloader.hide {
          height: 0%;
          top: -50%;
        }

        .preloader-inner {
          position: absolute;
          z-index: 100;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          transition: all 0.5s ease;
          -moz-transition: all 0.5s ease;
          -ms-transition: all 0.5s ease;
          -o-transition: all 0.5s ease;
          -webkit-transition: all 0.5s ease;
          text-align: center;
        }

        #preloader.hide .preloader-inner {
          opacity: 0;
          visibility: hidden;
        }

        /* Spinner Loading */
        .preloader-inner .spinner {
          position: relative;
          width: 100%;
          max-width: 150px;
          margin: 0 auto;
          animation: dropIn 1.2s ease-out forwards;
        }
        
        /* Tambahan: Memastikan logo responsif di dalam spinner */
        .preloader-inner .spinner img {
            max-width: 100%;
            height: auto;
        }

        /* Kode asli Anda yang dipertahankan */
        .preloader-inner .spinner img.wheel {
          position: absolute;
          left: 52%;
          transform: translateX(-50%);
          transform-origin: center;
          top: 9px;
          animation: spinner 2.5s infinite linear;
          display: inline-block;
          width: auto;
        }

        /* Aturan baru untuk teks di bawah logo */
        .preloader-text {
          color: #ffffff;
          font-size: 24px;
          font-weight: 600;
          letter-spacing: 2px;
          margin-top: 20px;
          opacity: 0;
          animation: slideInFromBottom 1.2s ease-out 0.3s forwards;
        }


        /* Kode asli Anda yang dipertahankan (Loading text) */
        .preloader-inner .loading-text {
          font-weight: var(--fw-semibold);
          font-size: 60px;
          line-height: 60px;
          text-align: center;
          user-select: none;
          animation: scale1 2.5s infinite linear;
          display: none;
        }

        .preloader-inner .loading-text .characters {
          position: relative;
          display: inline-block;
          color: rgba(255, 255, 255, 0.2);
        }

        .preloader-inner .loading-text .characters:before {
          content: attr(data-preloader-text);
          position: absolute;
          left: 0;
          top: 0px;
          opacity: 0;
          transform: rotateY(-90deg);
          color: white;
          animation: characters 4s infinite;
        }

        .preloader-inner .loading-text .characters:nth-child(2):before {
          animation-delay: 0.2s;
        }
        .preloader-inner .loading-text .characters:nth-child(3):before {
          animation-delay: 0.4s;
        }
        .preloader-inner .loading-text .characters:nth-child(4):before {
          animation-delay: 0.6s;
        }
        .preloader-inner .loading-text .characters:nth-child(5):before {
          animation-delay: 0.8s;
        }
        .preloader-inner .loading-text .characters:nth-child(6):before {
          animation-delay: 1s;
        }
        .preloader-inner .loading-text .characters:nth-child(7):before {
          animation-delay: 1.2s;
        }

        /* Kode keyframes asli Anda yang dipertahankan */
        @keyframes spinner {
          to {
            transform: translateX(50%) rotateZ(360deg);
          }
        }
        @keyframes characters {
          0%,
          75%,
          100% {
            opacity: 0;
            transform: rotateY(-90deg);
          }
          25%,
          50% {
            opacity: 1;
            transform: rotateY(0deg);
          }
        }
        @keyframes scale1 {
          0% {
            transform: scale(1);
            opacity: 1;
          }
          50% {
            transform: scale(0.8);
            opacity: 0;
          }
          100% {
            transform: scale(1);
            opacity: 1;
          }
        }
        @keyframes dropIn {
          0% {
            transform: translateY(-200px);
            opacity: 0;
          }
          100% {
            transform: translateY(0);
            opacity: 1;
          }
        }
        @keyframes slideInFromRight {
          0% {
            transform: translateX(150px);
            opacity: 0;
          }
          100% {
            transform: translateX(0);
            opacity: 1;
          }
        }
        @keyframes slideInFromBottom {
          0% {
            transform: translateY(100px); /* Mulai dari bawah */
            opacity: 0;
          }
          100% {
            transform: translateY(0); /* Kembali ke posisi normal */
            opacity: 1;
          }
        }
        /* == PRELOADER CSS END == */


        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #3d0145 0%, #bd21ff 100%);
            color: white;
            overflow-x: hidden;
        }

        /* Header Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(26, 11, 46, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(139, 92, 246, 0.2);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #c084fc;
        }

        .btn-login {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .mobile-menu-btn:hover {
            transform: scale(1.1);
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .mobile-menu-overlay.active {
            display: block;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -400px;
            width: 350px;
            height: 100vh;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.95) 0%, rgba(236, 72, 153, 0.95) 100%);
            z-index: 10000;
            transition: right 0.3s ease;
            padding: 2rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-menu-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .mobile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav li {
            margin-bottom: 1rem;
        }

        .mobile-nav .nav-link {
            display: block;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }

        .mobile-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 6rem 2rem 2rem;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.3;
            background: 
                radial-gradient(circle at 20% 50%, rgb(136, 76, 255) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgb(255, 87, 171) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        /* Grid Pattern */
        .hero-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            opacity: 0.4;
        }

        /* Additional Glow Effect */
        .hero-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(184, 149, 255, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Animated Lines */

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            justify-items: center;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(139, 92, 246, 0.1);
            border: 1px solid rgba(139, 92, 246, 0.3);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            margin-bottom: 2rem;
            color: #c084fc;
            font-weight: 500;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .hero-title-highlight {
            background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-description {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-primary-glow {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 20px;
            padding: 2rem;
            background: rgba(139, 92, 246, 0.1);
            border: 2px solid rgba(139, 92, 246, 0.3);
            backdrop-filter: blur(10px);
            animation: float 6s ease-in-out infinite;
        }

        .floating-left {
            bottom: 20%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-right {
            top: 30%;
            right: 5%;
            animation-delay: 2s;
        }

        /* Features Section */
        .features-section {
            padding: 6rem 2rem;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .section-title-highlight {
            background: linear-gradient(135deg, #ffffff 0%, #aeaeae 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(139, 92, 246, 0.1);
            border: 2px solid rgba(139, 92, 246, 0.2);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
            text-decoration: none;
            color: white;
            display: block;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(139, 92, 246, 0.5);
            box-shadow: 0 10px 40px rgba(139, 92, 246, 0.3);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(139, 92, 246, 0.2);
            border: 2px solid rgba(139, 92, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            overflow: hidden;
        }

        .feature-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            text-align: center;
        }

        /* ToTop Button Hover */
        #toTop:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
        }

        /* Social Media Icons Hover */
        footer a:hover {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%) !important;
            border-color: #c084fc !important;
            color: white !important;
            transform: translateY(-3px);
        }

        .pattern-layer {
            position: absolute;
            inset: 0;
            background-image: radial-gradient( circle, rgba(186, 104, 200, 0.25) 1.5px, transparent 1.5px);
            background-size: 30px 30px;
            z-index: 0;
            transition: background-position 0.15s ease-out;
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            .mobile-menu-btn {
                display: flex !important;
            }

            .mobile-menu.active {
                width: 100%;
            }

            .hero-title {
                font-size: 2.5rem;
                align-items: center;
                text-align: center;
            }

            .section-title {
                font-size: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .hero-section {
                padding: 5rem 1rem 2rem;
            }

            .floating-element {
                display: none;
            }

            #about h1 {
                font-size: 2rem !important;
            }

            #about p {
                font-size: 1rem !important;
            }

            footer > div > div {
                flex-direction: column;
                text-align: center;
            }

            footer > div > div > div:first-child {
                margin-bottom: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary-glow,
            .btn-outline-white {
                width: 100%;
            }

            .mobile-menu {
                width: 0%;
            }

            .hero-content {
                margin: 50px !important;
            }

            .btn-login span {
                display: none;
            }

            .brand-text {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem !important;
            }

            .hero-description {
                font-size: 1rem !important;
            }

            .navbar-brand i {
                font-size: 1.5rem;
            }

            .navbar {
                padding: 0.75rem 1rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
            }

            .feature-icon img {
                width: 45px;
                height: 45px;
            }

            .section-title {
                font-size: 1.5rem !important;
            }

            .section-subtitle {
                font-size: 1rem !important;
            }
        }
    </style>
</head>

<body>
    
    <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <img src="../assets/img/logo.png" alt="img">
            </div>
            <h2 class="preloader-text">Portal SIPASTI</h2>
        </div>
    </div>

    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-file-alt"></i>
                    <span class="brand-text">SIPASTI</span>
                </a>
                
                <div class="d-none d-md-flex align-items-center gap-3">
                    <ul class="navbar-nav">
                        <li><a href="#home" class="nav-link">Home</a></li>
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

                <button class="mobile-menu-btn d-md-none" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

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

    <section class="hero-section">
        <div class="pattern-layer"></div>
        <div class="hero-background"></div>
        
        <div class="animated-lines">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
            <div class="line line-4"></div>
                    </div>
        
        <div class="floating-element floating-left d-none d-lg-block">
            <div class="text-center">
            <i style="font-size: 2.5rem; margin-bottom: 0.5rem;" class="fa-solid fa-book"></i>
                <div style="font-weight: 700; font-size: 1.2rem;">Pengawasan</div>
                </div>
        </div>
        <div class="floating-element floating-right d-none d-lg-block">
            <div class="text-center">
            <i style="font-size: 2.5rem; margin-bottom: 0.5rem;" class="fa-solid fa-shield-halved"></i>
                <div style="font-weight: 700; font-size: 1.2rem;">Tindak Lanjut</div>
                </div>
        </div>

        <div id="home" class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-sparkles"></i> Portal Resmi SIPASTI
            </div>
            <h1 class="hero-title">
                Portal <span class="hero-title-highlight">Sipasti</span>
            </h1>
            <p class="hero-description">
                Sistem Informasi Pengawasan dan Tindak Lanjut
            </p>
            </div>
    </section>

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

    <div id="toTop" style="position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px; background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4); transition: all 0.3s; z-index: 999; opacity: 0; visibility: hidden;">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Menjalankan semua script setelah halaman (DOM) selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            
            // === LOGIKA PRELOADER ===
            // Sembunyikan preloader setelah 1 detik (1000ms)
            setTimeout(function() {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.classList.add('hide');
                }
            }, 1000);
            // === AKHIR LOGIKA PRELOADER ===


            // === KODE ASLI DARI home.php ===

            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileMenuClose = document.getElementById('mobileMenuClose');

            function openMobileMenu() {
                if (mobileMenu) mobileMenu.classList.add('active');
                if (mobileMenuOverlay) mobileMenuOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeMobileMenu() {
                if (mobileMenu) mobileMenu.classList.remove('active');
                if (mobileMenuOverlay) mobileMenuOverlay.classList.remove('active');
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
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    try {
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    } catch (error) {
                        console.warn('Smooth scroll target not found:', this.getAttribute('href'));
                    }
                });
            });

            // Add scroll effect to navbar
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                const toTop = document.getElementById('toTop');
                
                if (navbar) {
                    if (window.scrollY > 50) {
                        navbar.style.background = 'rgba(26, 11, 46, 0.95)';
                    } else {
                        navbar.style.background = 'rgba(26, 11, 46, 0.8)';
                    }
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
            const toTopButton = document.getElementById('toTop');
            if(toTopButton) {
                toTopButton.addEventListener('click', function() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

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

            // Pattern Layer
            document.addEventListener("mousemove", function(e) {
                const pattern = document.querySelector(".pattern-layer");
                if (pattern) {
                    const x = (e.clientX / window.innerWidth) * 30;
                    const y = (e.clientY / window.innerHeight) * 30;
                    pattern.style.backgroundPosition = `${x}px ${y}px`;
                }
            });

        }); // Akhir dari DOMContentLoaded
    </script>
    
</body>
</html>