# JARVIS AI - Kurumsal Web Sitesi Projesi

Bu proje, **Kocaeli Üniversitesi Teknoloji Fakültesi Bilişim Sistemleri Mühendisliği** Bölümü, 2025–2026 Güz Dönemi **TBL303: Web Tasarımı Dersi** kapsamında hazırlanmıştır.

Yapay zeka çözümleri sunan kurgusal bir teknoloji şirketi olan **JARVIS AI** için modern, responsive (mobil uyumlu) ve kullanıcı dostu bir web sitesi arayüzü tasarlanmıştır.

**Canlı Önizleme (Live Demo):** [https://iremkalayci.github.io/jarvis-ai/](https://iremkalayci.github.io/jarvis-ai/)

## Proje Özellikleri

Bu proje, modern web tasarım prensipleri ve ders isterleri doğrultusunda aşağıdaki özellikleri içerir:

* **Responsive Tasarım:** Masaüstü, tablet ve mobil cihazlarda kusursuz çalışan esnek yapı (Bootstrap 5).
* **One-Page (Tek Sayfa) Yapısı:** Menüden tıklandığında sayfa içinde yumuşak geçiş (smooth scroll) ile ilgili bölüme gitme.
* **Gelişmiş Slider (Carousel):** Ana sayfada otomatik değişen, hem görsel hem metin animasyonlu manşet alanı.
* **Yönetim Paneli (Admin Dashboard):**
    * Sunucu tarafı kodlama olmadan (Back-end simülasyonu) tasarlanmış arayüz.
    * Ürün ekleme, duyuru yönetimi ve dosya yükleme form tasarımları.
    * *Erişim:* Footer (Sayfa altı) kısmındaki "Yönetici Girişi" linkinden ulaşılabilir.
* **Dinamik Bileşenler:**
    * **Chart.js:** "Sayılarla AI" sayfasında dinamik istatistik grafikleri.
    * **Modals:** Duyurular için sayfa yenilenmeden açılan detay pencereleri.
* **Ürün & Hizmet Sayfaları:** Özelleştirilmiş detay sayfaları (NLP, Görüntü İşleme, Veri Analitiği).

## Kullanılan Teknolojiler

* **HTML5:** Semantik sayfa yapısı.
* **CSS3:** Özelleştirilmiş stiller ve animasyonlar.
* **JavaScript:** Slider mantığı, interaktif geçişler ve Chart.js konfigürasyonu.
* **Bootstrap 5:** Responsive grid sistemi ve bileşenler.
* **Chart.js:** Veri görselleştirme kütüphanesi.
* **Google Fonts:** Raleway ve Roboto font aileleri.

## Proje Yapısı

```text
jarvis-ai/
├── assets/
│   ├── css/          # Stil dosyaları (main.css)
│   ├── img/          # Proje görselleri
│   ├── js/           # JavaScript dosyaları
│   └── vendor/       # Bootstrap ve diğer kütüphaneler
├── index.html        # Ana Sayfa (Landing Page)
├── admin.html        # Yönetim Paneli Tasarımı
├── duyurular.html    # Tüm Duyurular Listesi
├── urun_nlp.html     # Ürün Detay Sayfası 1
├── urun_goruntu.html # Ürün Detay Sayfası 2
├── urun_tahmin.html  # Ürün Detay Sayfası 3
├── misyon_vizyon.html# Misyon & Vizyon Sayfası
└── README.md         # Proje Dokümantasyonu
Hakkında
Ders: TBL303 Web Tasarımı

Geliştirici: İrem Kalaycı

Okul No:231307047

Şablon: Bu proje, GP - BootstrapMade şablonu temel alınarak, proje isterlerine uygun şekilde %80 oranında özelleştirilmiş ve yeniden yapılandırılmıştır.
Template Name: Gp
Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
Author: BootstrapMade.com
License: https://bootstrapmade.com/license/
