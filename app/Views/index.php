<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Jarvis Ai</title>
  <link href="<?= base_url('assets/img/gemini.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Orbitron:wght@400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">

  <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .header .logo h1 {
        white-space: nowrap !important;
        display: flex;
        align-items: center;
        font-family: "Orbitron", sans-serif !important;
        font-size: 26px !important;
        margin: 0;
    }

    .header .btn-getstarted {
        font-family: "Orbitron", sans-serif !important;
        font-size: 13px !important;
        padding: 8px 25px !important;
        border-radius: 50px !important;
        margin-left: 25px !important;
        white-space: nowrap;
        height: auto !important;
        line-height: normal !important;
        border: 1px solid #00f3ff !important;
        color: #00f3ff !important;
        background: transparent;
        transition: 0.3s;
    }

    .header .btn-getstarted:hover {
        background: #00f3ff !important;
        color: #000 !important;
        box-shadow: 0 0 15px rgba(0, 243, 255, 0.6);
    }

    .hero-title {
        font-family: "Orbitron", sans-serif !important;
        font-weight: 700 !important;
        font-size: 42px !important;
        color: #fff !important;
        margin-bottom: 15px !important;
        letter-spacing: 1px !important;
        text-transform: uppercase;
        text-shadow: 0 0 20px rgba(0,0,0,0.5);
        white-space: nowrap; 
    }

    .hero-title span { color: #ffffff !important; }

    .hero-subtitle {
        font-family: "Rajdhani", sans-serif !important;
        color: rgba(255, 255, 255, 0.9) !important;
        font-size: 24px !important;
        font-weight: 400 !important;
        white-space: nowrap;
        letter-spacing: 1px;
    }

    @media (max-width: 992px) {
        .hero-title { 
            font-size: 28px !important; 
            white-space: normal; 
            text-align: center;
        }
        .hero-subtitle { 
            font-size: 18px !important; 
            white-space: normal;
            text-align: center;
        }
        .header .btn-getstarted {
            margin: 10px 0;
        }
    }

    #heroCarousel {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;
    }

    .hero-content-layer {
        position: relative; z-index: 2; width: 100%; height: 100%;
        display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 50px;
    }
    
    .hero-btns {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-hero {
        font-family: "Orbitron", sans-serif;
        font-size: 16px;
        font-weight: 600;
        padding: 12px 35px;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s;
        border: 2px solid #00f3ff;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
    }
    
    .btn-hero.primary {
        background: rgba(0, 243, 255, 0.15);
        color: #00f3ff;
    }
    .btn-hero.primary:hover {
        background: #00f3ff;
        color: #000;
        box-shadow: 0 0 20px rgba(0, 243, 255, 0.6);
    }

    .btn-hero.secondary {
        background: transparent;
        color: #fff;
        border-color: rgba(255, 255, 255, 0.5);
        font-size: 18px;
        padding: 14px 40px;
    }
    .btn-hero.secondary:hover {
        border-color: #00f3ff;
        color: #00f3ff;
        box-shadow: 0 0 20px rgba(0, 243, 255, 0.4);
        transform: scale(1.05);
    }

    .navmenu a, .navmenu ul li a {
        font-family: "Orbitron", sans-serif !important;
        font-weight: 500 !important;
        transition: color 0.3s ease, background-color 0.3s ease !important;
        transform: none !important;
    }

    .service-item {
        position: relative;
    }

    .service-item .product-buttons {
        display: flex;
        gap: 10px;
        margin-top: 15px;
        position: relative;
        z-index: 10;
    }

    .service-item .btn-product {
        flex: 1;
        padding: 8px 15px;
        font-size: 13px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s;
        font-family: "Orbitron", sans-serif;
        font-weight: 500;
    }

    .service-item .btn-detail {
        background: rgba(0, 243, 255, 0.1);
        color: #00f3ff;
        border: 1px solid #00f3ff;
    }

    .service-item .btn-detail:hover {
        background: #00f3ff;
        color: #000;
    }

    .service-item .btn-cart {
        background: rgba(0, 255, 100, 0.1);
        color: #00ff64;
        border: 1px solid #00ff64;
    }

    .service-item .btn-cart:hover {
        background: #00ff64;
        color: #000;
    }

  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1 class="sitename">JARVIS AI<span>.</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('/') ?>#hero" class="active">ANA SAYFA</a></li>
          <li><a href="<?= base_url('/') ?>#about">HAKKIMIZDA</a></li>
          <li><a href="<?= base_url('/') ?>#mission">MİSYON-VİZYON</a></li>

          <li class="dropdown">
            <a href="<?= base_url('/') ?>#services">
              <span>HİZMETLER</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
              <li><a href="<?= base_url('/') ?>#services">NLP Çözümleri</a></li>
              <li><a href="<?= base_url('/') ?>#services">Görüntü İşleme</a></li>
              <li><a href="<?= base_url('/') ?>#services">Veri Analitiği</a></li>
              <li><a href="<?= base_url('/') ?>#services">Siber Güvenlik</a></li>
              <li><a href="<?= base_url('/') ?>#services">Akıllı Asistanlar</a></li>
              <li><a href="<?= base_url('/') ?>#services">Robotik Süreç</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="<?= base_url('/') ?>#urunler">
              <span>ÜRÜNLERİMİZ</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
              <li><a href="<?= base_url('urun/1') ?>">Jarvis NLP Pro</a></li>
              <li><a href="<?= base_url('urun/2') ?>">Vision X</a></li>
              <li><a href="<?= base_url('urun/3') ?>">DataCore</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="<?= base_url('/') ?>#units">
              <span>BİRİMLERİMİZ</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
              <li><a href="<?= base_url('/') ?>#units">Ar-Ge Birimi</a></li>
              <li><a href="<?= base_url('/') ?>#units">Müşteri Çözümleri</a></li>
            </ul>
          </li>
          
          <li><a href="<?= base_url('/') ?>#duyurular">DUYURULAR</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-buttons d-flex align-items-center">
        <?php if(session()->get('isLoggedIn')): ?>
            
            <?php 
                $cartCount = 0;
                if(session()->has('cart')) {
                    foreach(session()->get('cart') as $item) {
                        $cartCount += $item['qty'];
                    }
                }
            ?>
            <a href="<?= base_url('sepet') ?>" class="btn-getstarted" style="background: rgba(0, 243, 255, 0.15); margin-right: 15px; border-color: #00f3ff !important; color: #00f3ff !important; padding: 6px 15px !important;">
                <i class="bi bi-cart3"></i> Sepetim (<span style="font-weight:bold;"><?= $cartCount ?></span>)
            </a>

            <span style="color: #00f3ff; margin-right: 15px; font-family: 'Orbitron', sans-serif; font-size: 14px;">
                <i class="bi bi-person-circle"></i> <?= esc(session()->get('name')) ?>
            </span>
            <span style="color: #fff; margin-right: 20px; font-family: 'Orbitron', sans-serif; font-size: 14px; background: rgba(0,243,255,0.1); padding: 5px 10px; border-radius: 5px; border: 1px solid rgba(0,243,255,0.3);">
                <i class="bi bi-wallet2"></i> <?= number_format(session()->get('balance'), 2, ',', '.') ?> TL
            </span>
            <a class="btn-getstarted" href="<?= base_url('cikis') ?>" style="background: rgba(255,0,0,0.1); border-color: #ff0033 !important; color: #ff0033 !important; margin-left: 0;">Çıkış</a>
        <?php else: ?>
            <a class="btn-getstarted" href="<?= base_url('giris') ?>" style="margin-left: 0; margin-right: 10px;">Giriş Yap</a>
            <a class="btn-getstarted" href="<?= base_url('kayit') ?>" style="background: rgba(0, 243, 255, 0.15); margin-left: 0;">Kayıt Ol</a>
        <?php endif; ?>
      </div>

    </div>
  </header>

  <main class="main">

    <section id="hero" class="hero section dark-background" style="padding: 0; min-height: 100vh; position: relative; overflow: hidden;">

      <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner" style="height: 100%;">
          
          <div class="carousel-item active" style="height: 100%;">
            <img src="<?= base_url('assets/img/hero-bg.jpg') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>
          
          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/nlpnew.png') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>
          
          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/goruntu.png') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>

          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/veri.png') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>

          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/cta-bg.jpg') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>

          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/header3.jpg') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>

          <div class="carousel-item" style="height: 100%;">
            <img src="<?= base_url('assets/img/robotiknew.png') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
          </div>

        </div>
      </div>

      <div class="hero-content-layer container">
        
        <div class="row justify-content-center text-center">
          <div class="col-xl-10 col-lg-10" id="heroTextContainer">
            <h2 class="hero-title" id="sliderTitle">J.A.R.V.I.S<span>.</span></h2>
            <p class="hero-subtitle" id="sliderSub">Just A Rather Very Intelligent Systems</p>
            
            <div class="hero-btns">
                <a href="#" id="sliderBtn" class="btn-hero primary" style="display: none;">
                    DETAYLARI İNCELE <i class="bi bi-arrow-right"></i>
                </a>
                
                <a href="<?= base_url('/') ?>#about" class="btn-hero secondary">
                    <i class="bi bi-bar-chart-line"></i> JARVIStatics
                </a>
            </div>

          </div>
        </div>

      </div>
    </section>

    <section id="about" class="about section" style="padding: 100px 0;">
      <div class="container" data-aos="fade-up">
        
        <div class="row justify-content-center text-center" style="margin-bottom: 80px;">
          <div class="col-lg-10">
            <h4 style="color: #00f3ff; font-family: 'Rajdhani', sans-serif; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; margin-bottom: 20px;">BİZ KİMİZ?</h4>
            
            <h3 style="font-size: 3rem; font-weight: 700; font-family: 'Orbitron', sans-serif; color: #fff; margin-bottom: 30px;">
              YARINI ŞEKİLLENDİREN TEKNOLOJİLER
            </h3>
            
            <p style="font-size: 1.2rem; color: #ccc; line-height: 1.9; max-width: 900px; margin: 0 auto;">
              Jarvis AI olarak veriyi sadece bir kod yığını olarak görmüyoruz. Derin öğrenme algoritmalarımız ve akıllı sistemlerimizle, işletmelerin karşılaştığı zorlukları fırsata çeviriyor, en karmaşık problemleri bile yalın ve güvenli çözümlerle aşıyoruz.
            </p>
          </div>
        </div>

        <div class="row gy-5">
          
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex flex-column align-items-center text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.1); border-radius: 15px; height: 100%; transition: 0.4s; padding: 50px 20px;">
              <i class="bi bi-rocket-takeoff" style="font-size: 50px; color: #00f3ff; margin-bottom: 25px; text-shadow: 0 0 20px rgba(0, 243, 255, 0.4);"></i>
              <h5 style="color: #fff; font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 15px;">Hız ve Performans</h5>
              <p style="font-size: 15px; color: #aaa; margin: 0; line-height: 1.6;">Verileriniz anlık olarak işlenir, bekleme süresi olmadan sonuç alırsınız.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex flex-column align-items-center text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.1); border-radius: 15px; height: 100%; transition: 0.4s; padding: 50px 20px;">
              <i class="bi bi-shield-lock" style="font-size: 50px; color: #00f3ff; margin-bottom: 25px; text-shadow: 0 0 20px rgba(0, 243, 255, 0.4);"></i>
              <h5 style="color: #fff; font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 15px;">Tam Güvenlik</h5>
              <p style="font-size: 15px; color: #aaa; margin: 0; line-height: 1.6;">Uçtan uca şifreleme ile verileriniz her zaman koruma altındadır.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="d-flex flex-column align-items-center text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.1); border-radius: 15px; height: 100%; transition: 0.4s; padding: 50px 20px;">
              <i class="bi bi-cpu" style="font-size: 50px; color: #00f3ff; margin-bottom: 25px; text-shadow: 0 0 20px rgba(0, 243, 255, 0.4);"></i>
              <h5 style="color: #fff; font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 15px;">Öğrenen Sistemler</h5>
              <p style="font-size: 15px; color: #aaa; margin: 0; line-height: 1.6;">Modellerimiz kendini sürekli geliştirir ve değişen şartlara adapte olur.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex flex-column align-items-center text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.1); border-radius: 15px; height: 100%; transition: 0.4s; padding: 50px 20px;">
              <i class="bi bi-globe" style="font-size: 50px; color: #00f3ff; margin-bottom: 25px; text-shadow: 0 0 20px rgba(0, 243, 255, 0.4);"></i>
              <h5 style="color: #fff; font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 15px;">Global Erişim</h5>
              <p style="font-size: 15px; color: #aaa; margin: 0; line-height: 1.6;">Dünyanın her yerinde, her an kesintisiz hizmet sunuyoruz.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="mission" class="mission section">
      <div class="container section-title" data-aos="fade-up">
        <h2>KURUMSAL</h2>
        <p>Misyon & Vizyon</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          
          <div class="col-lg-6">
            <div class="mission-box">
              <div class="icon">
                <i class="bi bi-bullseye"></i>
              </div>
              <h3>Misyonumuz</h3>
              <p>Teknolojiyi insanlığın hizmetine sunarak, karmaşık veri süreçlerini sadeleştirmek ve kurumların potansiyellerini en üst seviyeye taşımaktır.</p>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="mission-box">
              <div class="icon">
                <i class="bi bi-eye"></i>
              </div>
              <h3>Vizyonumuz</h3>
              <p>Yapay zeka alanında güvenilir bir ekosistem yaratarak, teknolojinin gücüyle daha akıllı ve güvenli bir gelecek inşa etmektir.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Hizmetlerimiz</h2>
        <p>Yapay Zeka Çözümleri</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-chat-text"></i></div>
                <h3>NLP Çözümleri</h3>
                <p>Metinleri analiz eden akıllı sistemler.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-eye"></i></div>
                <h3>Görüntü İşleme</h3>
                <p>Güvenlik ve analiz için görsel zeka.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                <h3>Veri Analitiği</h3>
                <p>Geleceği tahmin eden algoritmalar.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-shield-check"></i></div>
                <h3>Siber Güvenlik</h3>
                <p>Yapay zeka destekli tehdit önleme.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-robot"></i></div>
                <h3>Akıllı Asistanlar</h3>
                <p>7/24 çalışan sanal müşteri temsilcileri.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-cpu"></i></div>
                <h3>Robotik Süreç</h3>
                <p>Ofis işlerinizi otomatize edin.</p>
                <a href="<?= base_url('/') ?>#services" class="readmore stretched-link">Detaylar <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  
    <section id="urunler" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Ürünlerimiz</h2>
        <p>Paket Yazılımlarımız</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">

            <?php foreach ($products as $product): ?>
            <div class="swiper-slide">
              <div class="service-item">
                <div class="icon"><i class="bi bi-cpu"></i></div>
                <h3><?= esc($product['title']) ?></h3>
                <p><?= esc($product['description']) ?></p>
                
                <p style="color: #00f3ff; font-weight: bold; font-size:18px;">
                  <?= number_format($product['price'], 2, ',', '.') ?> TL
                </p>
                
                <div class="product-buttons">
                  <a href="<?= base_url('urun/' . $product['id']) ?>" class="btn-product btn-detail">
                    <i class="bi bi-info-circle"></i> Detayları İncele
                  </a>
                  <a href="<?= base_url('sepete-ekle/' . $product['id']) ?>" class="btn-product btn-cart">
                    <i class="bi bi-cart-plus"></i> Sepete Ekle
                  </a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <section id="units" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>BİRİMLERİMİZ</h2>
        <p>Uzman Ekiplerimiz</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          
          <div class="col-lg-6 col-md-6">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-motherboard"></i></div> 
              <h3>Ar-Ge Birimi</h3>
              <p>Geleceğin teknolojilerini tasarlayan inovasyon laboratuvarımız.</p>
              <a href="<?= base_url('/') ?>#units" class="readmore stretched-link">İncele <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-6 col-md-6">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-headset"></i></div> 
              <h3>Müşteri Çözümleri</h3>
              <p>İhtiyaçlarınıza özel stratejiler geliştiren başarı ekibimiz.</p>
              <a href="<?= base_url('/') ?>#units" class="readmore stretched-link">İncele <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section>
    
    <section id="duyurular" class="services section" style="background-color: #f9f9f9;">
      <div class="container section-title" data-aos="fade-up">
        <h2>Duyurular</h2>
        <p>Güncel Haberler</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-megaphone"></i></div>
              <h3>Yeni Yasa Düzenlemesi</h3>
              <p>Yapay zeka etiği hakkında yeni düzenlemeler...</p>
              <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#duyuruModal1"></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-award"></i></div>
              <h3>Yılın Girişimi Ödülü</h3>
              <p>Teknofest 2024 kapsamında ödül aldık...</p>
              <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#duyuruModal2"></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar-event"></i></div>
              <h3>Yaz Stajı Başvuruları</h3>
              <p>2025 Yaz dönemi staj başvuruları başladı...</p>
              <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#duyuruModal3"></a>
            </div>
          </div>
          <div class="col-12 text-center mt-4">
             <a href="<?= base_url('/') ?>#duyurular" class="btn btn-warning">Daha Fazla Duyuru</a>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>İletişim</h2>
        <p>Bize Ulaşın</p>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="mb-4">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?q=2570%20N%20First%20St%2C%20San%20Jose%2C%20CA&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Adres</h3>
                <p>2570 N First St, Silicon Valley, San Jose, CA</p>
              </div>
            </div>
            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>info@jarvisai.com</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">
                <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Adınız" required></div>
                <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Emailiniz" required></div>
                <div class="col-md-12"><input type="text" name="subject" class="form-control" placeholder="Konu" required></div>
                <div class="col-md-12"><textarea class="form-control" name="message" rows="6" placeholder="Mesajınız" required></textarea></div>
                <div class="col-md-12 text-center"><button type="submit">Gönder</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer dark-background" style="border-top: 1px solid rgba(0, 243, 255, 0.1); padding: 40px 0; background: #050505;">
    <div class="container text-center">
      
      <h3 style="font-family: 'Orbitron', sans-serif; color: #fff; margin-bottom: 25px; letter-spacing: 2px;">JARVIS AI<span style="color: #00f3ff;">.</span></h3>
      
      <div class="social-links d-flex justify-content-center gap-3 mb-4">
        <a href="https://twitter.com" target="_blank" class="social-btn"><i class="bi bi-twitter-x"></i></a>
        <a href="https://facebook.com" target="_blank" class="social-btn"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com" target="_blank" class="social-btn"><i class="bi bi-instagram"></i></a>
        <a href="https://linkedin.com/in/iremkalayci" target="_blank" class="social-btn"><i class="bi bi-linkedin"></i></a>
        <a href="https://github.com/iremkalayci" target="_blank" class="social-btn"><i class="bi bi-github"></i></a>
      </div>

      <div class="contact-info mb-3" style="color: #ccc; font-size: 14px;">
        <p><i class="bi bi-geo-alt-fill me-2" style="color: #00f3ff;"></i>2570 N First St, Silicon Valley, San Jose, CA</p>
        <p><i class="bi bi-telephone-fill me-2" style="color: #00f3ff;"></i> +90 555 123 45 67</p>
      </div>

      <p style="color: #888; font-size: 13px; margin-top: 20px;">© <span>Copyright</span> <strong class="px-1 sitename" style="color: #fff;">JARVIS AI</strong> <span>All Rights Reserved</span></p>
      <div class="credits" style="font-size: 13px; color: #888;">
        Designed by <a href="#" style="color: #00f3ff; text-decoration: none; font-weight: bold;">İrem Kalaycı</a>
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <div class="modal fade" id="duyuruModal1" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Yeni Yasa</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Yasa detayları...</p></div></div></div></div>
  <div class="modal fade" id="duyuruModal2" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Ödül</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Detaylar...</p></div></div></div></div>
  <div class="modal fade" id="duyuruModal3" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Staj</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Başvuru koşulları...</p></div></div></div></div>

  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
  <script src="<?= base_url('assets/js/main.js') ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1, 
      spaceBetween: 30, 
      loop: true, 
      autoplay: {
        delay: 3000, 
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 1, spaceBetween: 20 },
        768: { slidesPerView: 2, spaceBetween: 30 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
      },
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var heroCarousel = document.getElementById('heroCarousel');
      var titleElement = document.getElementById('sliderTitle');
      var subElement = document.getElementById('sliderSub');
      var btnElement = document.getElementById('sliderBtn'); 

      var texts = [
        { 
            t: "J.A.R.V.I.S<span>.</span>", 
            s: "Just A Rather Very Intelligent Systems", 
            link: "#", 
            showBtn: false 
        },
        { 
            t: "DOĞAL DİL İŞLEME<span>.</span>", 
            s: "İnsan Dilini Anlayan Akıllı Sistemler", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        },
        { 
            t: "GÖRÜNTÜ TANIMA<span>.</span>", 
            s: "Güvenlik ve Analiz İçin Görsel İşleme", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        },
        {
            t: "VERİ ANALİTİĞİ<span>.</span>", 
            s: "Büyük Veri ve Analitik Hizmetleri", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        },
        {
            t: "SİBER GÜVENLİK<span>.</span>", 
            s: "Tehditleri Gerçekleşmeden Tespit Edin", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        },
        {
            t: "AKILLI ASİSTANLAR<span>.</span>", 
            s: "7/24 Çalışan Dijital Çalışanlarınız", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        },
        {
            t: "ROBOTİK SÜREÇ<span>.</span>", 
            s: "Tekrar Eden İşlere Son Verin", 
            link: "<?= base_url('/') ?>#services",
            showBtn: true
        }
      ];

      heroCarousel.addEventListener('slide.bs.carousel', function (e) {
        var index = e.to; 
        titleElement.innerHTML = texts[index].t;
        subElement.textContent = texts[index].s;
        
        if (texts[index].showBtn) {
            btnElement.style.display = "inline-flex";
            btnElement.href = texts[index].link;
        } else {
            btnElement.style.display = "none";
        }
      });
    });
  </script>

</body>
</html>