<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Doğal Dil İşleme - JARVIS AI</title>
  
  <link href="assets/img/gemini.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Orbitron:wght@400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    /* LOGO TEK SATIR AYARI */
    .header .logo h1 {
        white-space: nowrap !important;
        display: flex;
        align-items: center;
    }
  </style>
</head>

<body class="index-page">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1 class="sitename">JARVIS AI<span>.</span></h1>
      </a>

      <div class="header-buttons d-flex align-items-center ms-auto">
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

    <div class="page-title" data-aos="fade" style="background-image: url('assets/img/hero-bg.jpg'); padding: 120px 0 60px 0; filter: brightness(0.8);">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Ana Sayfa</a></li>
            <li><a href="#">Ürünlerimiz</a></li>
            <li class="current">Doğal Dil İşleme</li>
          </ol>
        </nav>
        <h1 style="color: #fff; font-family: 'Orbitron', sans-serif;">Doğal Dil İşleme (NLP) Modeli</h1>
      </div>
    </div>

    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/natural.jpg" alt="NLP Ürünü" class="img-fluid services-img" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.5); width: 100%; border: 1px solid rgba(255,255,255,0.1);">
            
            <div class="help-box d-flex flex-column justify-content-center align-items-center mt-4" style="background-color: rgba(255,255,255,0.05); border: 1px solid #00f3ff; color: #fff; padding: 30px; border-radius: 8px; backdrop-filter: blur(5px);">
              <i class="bi bi-headset help-icon" style="font-size: 40px; margin-bottom: 10px; color: #00f3ff !important;"></i>
              <h4 style="font-family: 'Orbitron', sans-serif;">Sorularınız mı var?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2" style="color: #fff !important;"></i> <span>+90 555 555 55 55</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2" style="color: #fff !important;"></i> <a href="mailto:info@jarvisai.com" style="color: #00f3ff;">info@jarvisai.com</a></p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            
            <div style="background: rgba(0, 243, 255, 0.1); color: #00f3ff; display: inline-block; padding: 8px 20px; border-radius: 5px; font-weight: bold; margin-bottom: 20px; border: 1px solid #00f3ff; font-family: 'Orbitron', sans-serif;">
                Lisans Ücreti: $299 / Ay
            </div>

            <h3 style="font-weight: 700; margin-bottom: 15px; color: #fff; font-family: 'Orbitron', sans-serif;">Jarvis NLP Pro v2.0</h3>
            <p style="color: #ccc;">
              Yapay zeka tabanlı Doğal Dil İşleme (NLP) motorumuz, metinleri insan hassasiyetiyle analiz eder, sınıflandırır ve anlamlandırır. Müşteri hizmetleri otomasyonu, duygu analizi ve büyük veri işleme süreçlerinizde devrim yaratır.
            </p>
            
            <p style="color: #ccc;">
              Çok dilli desteği sayesinde global ölçekte verilerinizi işleyebilir, karmaşık dokümanlardan saniyeler içinde anlamlı özetler çıkarabilirsiniz.
            </p>

            <h4 class="mt-4" style="font-weight: 600; color: #fff; font-family: 'Orbitron', sans-serif;">Temel Özellikler</h4>
            <ul style="list-style: none; padding: 0;">
              <li style="margin-bottom: 10px; color: #ccc;"><i class="bi bi-check-circle-fill me-2" style="color: #fff !important;"></i> 50+ Dilde Metin Analizi ve Çeviri</li>
              <li style="margin-bottom: 10px; color: #ccc;"><i class="bi bi-check-circle-fill me-2" style="color: #fff !important;"></i> Gerçek Zamanlı Duygu Analizi (Pozitif/Negatif)</li>
              <li style="margin-bottom: 10px; color: #ccc;"><i class="bi bi-check-circle-fill me-2" style="color: #fff !important;"></i> Otomatik Metin Özetleme ve Etiketleme</li>
              <li style="margin-bottom: 10px; color: #ccc;"><i class="bi bi-check-circle-fill me-2" style="color: #fff !important;"></i> Sesli Komutları Metne Dönüştürme (Speech-to-Text)</li>
              <li style="margin-bottom: 10px; color: #ccc;"><i class="bi bi-check-circle-fill me-2" style="color: #fff !important;"></i> Gelişmiş API Entegrasyonu</li>
            </ul>

            <div class="mt-5">
                <a href="index.html#contact" class="btn btn-warning btn-lg" style="padding: 12px 40px; font-weight: bold; font-family: 'Orbitron', sans-serif;">HEMEN SATIN AL</a>
            </div>

          </div>

        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container text-center">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">JARVIS AI</strong> <span>All Rights Reserved</span></p>
      <div class="credits">Designed by <a href="#">İrem Kalaycı</a></div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>