<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hesabım - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
<div style="text-align:center; margin-bottom:25px;">
    <?php if(session()->get('profile_photo')): ?>
        <img src="<?= base_url('uploads/users/' . session()->get('profile_photo')) ?>" 
             style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:2px solid #00f3ff;">
    <?php else: ?>
        <div style="width:120px; height:120px; border-radius:50%; border:2px solid #00f3ff; display:flex; align-items:center; justify-content:center; margin:auto; color:#00f3ff; font-size:45px;">
            <i class="bi bi-person"></i>
        </div>
    <?php endif; ?>
</div>
    <style>
        body {
            background: #050505;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            padding: 50px 20px;
        }

        .account-wrapper {
            max-width: 1050px;
            margin: auto;
        }

        .account-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(0,243,255,0.55);
            border-radius: 22px;
            padding: 35px;
            box-shadow: 0 0 28px rgba(0,243,255,0.12);
            margin-bottom: 28px;
        }

        h1, h2 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 28px;
        }

        label {
            color: #00f3ff;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(0,243,255,0.35);
            color: #fff;
            border-radius: 12px;
            padding: 12px 14px;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.06);
            border-color: #00f3ff;
            color: #fff;
            box-shadow: 0 0 15px rgba(0,243,255,0.20);
        }

        textarea.form-control {
            min-height: 110px;
        }

        .info-line {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0,243,255,0.15);
            padding: 14px 0;
            gap: 20px;
        }

        .info-line span:first-child {
            color: #00f3ff;
        }

        .info-line span:last-child {
            color: #fff;
            text-align: right;
        }

        .btn-neon {
            color: #00f3ff;
            border: 1px solid #00f3ff;
            background: transparent;
            padding: 11px 24px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-neon:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0,243,255,0.4);
        }

        .btn-danger-neon {
            color: #ff4d6d;
            border-color: #ff4d6d;
        }

        .btn-danger-neon:hover {
            background: #ff4d6d;
            color: #000;
            box-shadow: 0 0 18px rgba(255,77,109,0.4);
        }

        .top-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="account-wrapper">

    <div class="account-card">
        <h1>Hesabım</h1>

        <div class="info-line">
            <span>Kullanıcı Adı</span>
            <span><?= esc(session()->get('name') ?? '-') ?></span>
        </div>

        <div class="info-line">
            <span>E-posta</span>
            <span><?= esc(session()->get('email') ?? '-') ?></span>
        </div>

        <div class="info-line">
            <span>Rol</span>
            <span><?= esc(session()->get('role') ?? 'user') ?></span>
        </div>

        <div class="info-line">
            <span>Bakiye</span>
            <span><?= number_format(session()->get('balance') ?? 0, 2, ',', '.') ?> TL</span>
        </div>

        <div class="info-line">
            <span>Adres</span>
            <span><?= esc(session()->get('address') ?? 'Adres eklenmedi') ?></span>
        </div>

        <div class="top-actions">
            <a href="<?= base_url('siparislerim') ?>" class="btn-neon">
                <i class="bi bi-box-seam"></i> Siparişlerim
            </a>

            <a href="<?= base_url('sepet') ?>" class="btn-neon">
                <i class="bi bi-cart3"></i> Sepetim
            </a>

            <a href="<?= base_url() ?>" class="btn-neon">
                <i class="bi bi-house"></i> Ana Sayfa
            </a>
        </div>
    </div>

    <div class="account-card">
        <h2>Bilgilerimi Güncelle</h2>

     <form action="<?= base_url('hesabim-guncelle') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Ad Soyad</label>
                <input type="text" name="name" class="form-control" value="<?= esc(session()->get('name') ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label>E-posta</label>
                <input type="email" name="email" class="form-control" value="<?= esc(session()->get('email') ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label>Adres</label>
                <textarea name="address" class="form-control" placeholder="Adresinizi girin..."><?= esc(session()->get('address') ?? '') ?></textarea>
            </div>
            <label>Profil Fotoğrafı</label>
<input type="file" name="profile_photo" class="form-control mb-3" accept="image/*">

            <button type="submit" class="btn-neon w-100">
                Bilgilerimi Güncelle
            </button>
        </form>
    </div>

    <div class="account-card">
        <h2>Şifre Güncelle</h2>

        <form action="<?= base_url('sifre-guncelle') ?>" method="post">
            <div class="mb-3">
                <label>Yeni Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="Yeni şifre girin" required>
            </div>

            <button type="submit" class="btn-neon w-100">
                Şifremi Güncelle
            </button>
        </form>
    </div>

    <div class="account-card">
        <h2>Üyelik İşlemleri</h2>

        <p style="color:#aaa; text-align:center;">
            Üyeliğinizi pasif hale getirirseniz tekrar giriş yapamazsınız. Admin hesabınızı tekrar aktif edebilir.
        </p>

        <div class="top-actions">
            <a href="<?= base_url('uyelik-pasif') ?>" 
               class="btn-neon btn-danger-neon"
               onclick="return confirm('Üyeliğinizi pasif hale getirmek istediğinize emin misiniz?')">
                <i class="bi bi-person-x"></i> Üyeliğimi Pasif Hale Getir
            </a>

            <a href="<?= base_url('cikis') ?>" class="btn-neon btn-danger-neon">
                <i class="bi bi-box-arrow-right"></i> Çıkış Yap
            </a>
        </div>
    </div>

</div>

</body>
</html>