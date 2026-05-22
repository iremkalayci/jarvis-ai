<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hesabı Aktif Et - Jarvis AI</title>

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

        .reactivate-box {
            max-width: 700px;
            margin: auto;
            text-align: center;
            border: 1px solid #00f3ff;
            border-radius: 22px;
            padding: 45px;
            background: rgba(255,255,255,0.03);
            box-shadow: 0 0 30px rgba(0,243,255,0.15);
        }

        h1 {
            color: #00f3ff;
            margin-bottom: 20px;
        }

        p {
            color: #ccc;
            margin-bottom: 30px;
        }

        .btn-neon {
            color: #00f3ff;
            border: 1px solid #00f3ff;
            background: transparent;
            padding: 12px 28px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-neon:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0,243,255,0.4);
        }
    </style>
</head>

<body>

<div class="reactivate-box">
    <h1>Hesabınız Pasif Durumda</h1>

    <p>
        Bu hesap daha önce pasif hale getirilmiş. Hesabınızı tekrar aktif ederek giriş yapmaya devam edebilirsiniz.
    </p>

    <form action="<?= base_url('hesap-aktif-et') ?>" method="post">
        <button type="submit" class="btn-neon">
            <i class="bi bi-person-check"></i> Hesabımı Tekrar Aktif Et
        </button>
    </form>

    <div style="margin-top:25px;">
        <a href="<?= base_url('giris') ?>" style="color:#aaa; text-decoration:none;">
            Giriş sayfasına dön
        </a>
    </div>
</div>

</body>
</html>