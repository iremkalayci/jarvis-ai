<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #050505;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            padding: 60px 20px;
        }

        .admin-box {
            max-width: 900px;
            margin: auto;
            background: rgba(255,255,255,0.03);
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 30px rgba(0,243,255,0.15);
            text-align: center;
        }

        h1 {
            color: #00f3ff;
            margin-bottom: 30px;
        }

        .admin-card {
            display: inline-block;
            width: 250px;
            margin: 15px;
            padding: 30px 20px;
            border: 1px solid rgba(0,243,255,0.5);
            border-radius: 18px;
            color: #00f3ff;
            text-decoration: none;
            transition: 0.3s;
        }

        .admin-card:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 25px rgba(0,243,255,0.5);
        }

        .admin-card i {
            font-size: 40px;
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="admin-box">
    <h1>Admin Panel</h1>

    <a href="<?= base_url('admin/siparisler') ?>" class="admin-card">
        <i class="bi bi-box-seam"></i>
        Siparişleri Yönet
    </a>
    <a href="<?= base_url('admin/urunler') ?>" class="admin-card">
    <i class="bi bi-box"></i>
    Ürünleri Yönet
</a>
<a href="<?= base_url('admin/kullanicilar') ?>" class="admin-card">
    <i class="bi bi-people"></i>
    Kullanıcıları Yönet
</a>

    <a href="<?= base_url() ?>" class="admin-card">
        <i class="bi bi-house"></i>
        Ana Sayfaya Dön
    </a>
</div>

</body>
</html>