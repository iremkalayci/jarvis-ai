@'
# JARVIS AI – Corporate Website & Backend Web Application Project

Bu proje, yapay zeka çözümleri sunan kurgusal bir teknoloji şirketi olan **JARVIS AI** için hazırlanmış modern, **Cyberpunk/Neon temalı**, responsive ve kullanıcı dostu bir website + backend web application projesidir.

Proje ilk olarak Web Tasarım dersi için statik bir frontend website olarak hazırlanmıştır. Daha sonra Web Programlama dersi kapsamında **CodeIgniter 4**, **PHP**, **MySQL** ve **XAMPP** kullanılarak backend özellikleri eklenmiş dinamik bir web application haline getirilmiştir.

---

## Preview / Running the Project

Proje ilk halinde GitHub Pages üzerinde statik frontend website olarak yayınlanmıştır.

Ancak proje **CodeIgniter 4 backend project** yapısına dönüştürüldüğü için artık GitHub Pages üzerinde tam haliyle çalışmaz. Çünkü GitHub Pages, PHP ve MySQL desteklemez.

Bu yüzden proje local ortamda **XAMPP** ve **CodeIgniter 4** ile çalıştırılmalıdır.

### Local Preview

XAMPP üzerinden Apache ve MySQL başlatıldıktan sonra proje klasöründe terminal açılır ve şu komut çalıştırılır:

php spark serve

Daha sonra tarayıcıdan şu adres açılır:

http://localhost:8080

Not: Login, register, cart, checkout, order creation ve database işlemleri yalnızca local server ortamında çalışır.

---

## Project Features

- **Modern UI/UX Design:** Cyberpunk/Neon tarzında, dikkat çekici ve modern bir arayüz tasarlanmıştır.
- **Responsive Structure:** Bootstrap 5 kullanılarak desktop, tablet ve mobile cihazlara uyumlu responsive yapı oluşturulmuştur.
- **Advanced Slider Integration (SwiperJS):**
  - Product ve service sectionlarında mobile ve desktop uyumlu slider yapıları kullanılmıştır.
- **One-Page Navigation:** Sayfa içi sectionlara smooth scrolling ile geçiş yapılabilmektedir.
- **Dynamic Components:**
  - **Chart.js:** Data visualization ve istatistik sectionları için kullanılmıştır.
  - **Modals:** Sayfa yenilenmeden açılan detail window yapıları oluşturulmuştur.
  - **Form Formatting:** Checkout inputları için client-side formatlama eklenmiştir.
- **Admin Panel (Dashboard):**
  - İlk frontend versiyonunda server-side kodlama olmadan dashboard simulation olarak tasarlanmıştır.
  - Product addition, announcement management ve file upload formları için arayüzler hazırlanmıştır.
- **Cyberpunk/Neon Theme:**
  - Dark mode, neon cyan renkler, glow effectler ve futuristik card tasarımları kullanılmıştır.
- **Typography:** Teknolojik görünüm için “Orbitron” ve “Rajdhani” fontları kullanılmıştır.

---

## Backend Features

- **CodeIgniter 4 MVC Structure:**
  - Statik HTML/CSS proje, CodeIgniter 4 MVC yapısına taşınmıştır.

- **Database Integration:**
  - MySQL database bağlantısı XAMPP ve phpMyAdmin üzerinden yapılandırılmıştır.

- **User Authentication System:**
  - Kullanıcılar register, login ve logout işlemlerini yapabilmektedir.
  - User bilgileri database üzerinde saklanmaktadır.

- **Session-Based User Interface:**
  - Login sonrası kullanıcı adı, cart bilgisi ve balance alanı dinamik olarak gösterilmektedir.

- **Dynamic Product System:**
  - Product bilgileri yalnızca statik HTML yerine database ve backend yapısıyla yönetilebilir hale getirilmiştir.

- **Dynamic Product Detail Page:**
  - Her ürün için ayrı ayrı statik sayfa oluşturmak yerine ortak bir product detail page yapısı hazırlanmıştır.
  - Farklı product ID değerlerine göre farklı product detail içerikleri açılabilmektedir.

- **Shopping Cart System:**
  - Kullanıcılar productları cart içine ekleyebilir.
  - Cart içeriğini görüntüleyebilir.
  - Product quantity artırıp azaltabilir.
  - Cart içinden product silebilir.
  - Cart tamamen temizlenebilir.
  - Total price dinamik olarak hesaplanır.

- **Checkout Page:**
  - Payment ve order information için checkout formu hazırlanmıştır.
  - Formda address, country, phone number, credit card number, expiration date ve CVV alanları bulunmaktadır.

- **Formatted Form Inputs:**
  - Credit card number `0000 0000 0000 0000` formatında düzenlenir.
  - Expiration date `MM/YY` formatında düzenlenir.
  - CVV inputu 3 digit ile sınırlandırılır.
  - Phone number seçilen country code değerine göre formatlanır.

- **Order Infrastructure:**
  - Basic order creation ve order tracking altyapısı başlatılmıştır.
  - `orders` ve `order_items` tabloları order management için eklenmiştir.

---

## Technologies and Libraries Used

- **HTML5:** Semantic page structure
- **CSS3:** Advanced styling, neon effects ve animations
- **JavaScript:** Slider configurations, modals, form formatting ve interactive components
- **Bootstrap 5:** Responsive structure ve ready-to-use UI components
- **Bootstrap Icons:** Icon library
- **SwiperJS:** Product ve service showcase için advanced slider library
- **Chart.js:** Data visualization ve charts
- **Google Fonts:** Orbitron ve Rajdhani fonts
- **PHP:** Server-side programming language
- **CodeIgniter 4:** MVC-based PHP framework
- **MySQL:** Database management system
- **XAMPP:** Local development environment
- **phpMyAdmin:** Database management interface

---

## Database Structure

Proje, MySQL üzerinde şu database adıyla çalışmaktadır:

jarvis_db

Projede kullanılan ana tablolar:

<pre>
users
products
orders
order_items
</pre>

- **users:** Registered user bilgilerini saklar.
- **products:** Product name, description, price ve image bilgilerini saklar.
- **orders:** User ID, total price, address, phone number, approval status ve order date bilgilerini saklar.
- **order_items:** Her order içindeki product bilgilerini saklar.

---

## Main Routes

<pre>
/                 Home page
/kayit            Register page
/giris            Login page
/cikis            Logout
/sepet            Shopping cart
/odeme            Checkout page
/siparislerim     User orders page
/urun/{id}        Dynamic product detail page
</pre>

---

## Local Installation and Usage

### 1. Clone the Repository

git clone https://github.com/iremkalayci/jarvis-ai.git

### 2. Move Project to XAMPP Directory

Project folder şu dizinin içine taşınmalıdır:

<pre>
C:\xampp\htdocs\
</pre>

Örnek:

<pre>
C:\xampp\htdocs\jarvis
</pre>

### 3. Start XAMPP

XAMPP Control Panel açılır ve şu servisler başlatılır:

<pre>
Apache
MySQL
</pre>

### 4. Open the Project in VS Code

VS Code üzerinden şu klasör açılır:

<pre>
C:\xampp\htdocs\jarvis
</pre>

### 5. Configure Database

phpMyAdmin açılır:

<pre>
http://localhost/phpmyadmin
</pre>

Şu isimde bir database oluşturulur:

jarvis_db

Gerekli tablolar import edilir veya manuel olarak oluşturulur.

### 6. Start CodeIgniter Local Server

Project directory içinde şu komut çalıştırılır:

php spark serve

Proje şu adreste çalışır:

<pre>
http://localhost:8080
</pre>

---

## Project Structure

<pre>
jarvis-ai/
├── app/
│   ├── Controllers/
│   │   ├── Home.php
│   │   ├── Auth.php
│   │   ├── Cart.php
│   │   └── Order.php
│   ├── Models/
│   ├── Views/
│   │   ├── index.php
│   │   ├── cart.php
│   │   ├── checkout.php
│   │   ├── my_orders.php
│   │   └── urun_detay.php
│   └── Config/
│       └── Routes.php
│
├── public/
│   ├── assets/
│   │   ├── css/        # Stylesheets
│   │   ├── img/        # Project images
│   │   ├── js/         # JavaScript files
│   │   └── vendor/     # Bootstrap, Swiper ve diğer libraries
│   └── index.php
│
├── writable/
├── .env
├── composer.json
├── spark
└── README.md
</pre>

---

## Development Progress

### Phase 1 – Frontend Website

- HTML, CSS, JavaScript ve Bootstrap kullanılarak statik corporate website oluşturuldu.
- Cyberpunk/Neon theme özelleştirildi.
- Product ve service pages tasarlandı.
- Slider, chart, modal ve dashboard-style pages eklendi.
- İlk statik frontend versiyonu GitHub Pages üzerinde yayınlandı.

### Phase 2 – Backend Web Application

- Proje CodeIgniter 4 MVC structure içine taşındı.
- MySQL database bağlantısı yapılandırıldı.
- User register/login/logout sistemi eklendi.
- Product detail pages dinamik hale getirildi.
- Shopping cart system geliştirildi.
- Cart quantity controls eklendi.
- Checkout page oluşturuldu.
- Phone ve credit card input formatting eklendi.
- Order creation ve order tracking infrastructure başlatıldı.

---

## Developer Information

- **Developer:** İrem Kalaycı
- **GitHub:** https://github.com/iremkalayci

---

## Resources and License

Bu proje, **BootstrapMade tarafından sunulan GP template** temel alınarak geliştirilmiştir. Template; custom design changes, layout edits, neon/cyberpunk styling, interactive components, dashboard pages ve backend functionality eklenerek önemli ölçüde özelleştirilmiştir.

- **Base Template:** GP by BootstrapMade
- **Template URL:** https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
- **License:** https://bootstrapmade.com/license/

Projede kullanılan ek libraries ve resources:

- **Bootstrap:** https://getbootstrap.com/
- **Bootstrap Icons:** https://icons.getbootstrap.com/
- **SwiperJS:** https://swiperjs.com/
- **Chart.js:** https://www.chartjs.org/
- **Google Fonts:** https://fonts.google.com/
- **CodeIgniter:** https://codeigniter.com/

Bu proje eğitim amacıyla hazırlanmıştır.
'@ | Set-Content -Path README.md -Encoding UTF8