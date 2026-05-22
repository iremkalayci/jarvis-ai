<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>AI Haberleri - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        body {
            background: #050505;
            color: #fff;
            padding: 50px;
        }

        .news-box {
            max-width: 1100px;
            margin: auto;
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 35px;
            background: rgba(255,255,255,0.03);
        }

        h1 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 35px;
        }

        .news-card {
            border: 1px solid rgba(0,243,255,0.25);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            background: rgba(255,255,255,0.025);
        }

        .news-card h3 {
            color: #00f3ff;
            font-size: 20px;
        }

        .news-card p {
            color: #ccc;
        }

        .news-card a {
            color: #00f3ff;
            text-decoration: none;
        }

        .btn-back {
            display: inline-block;
            margin-top: 25px;
            border: 1px solid #00f3ff;
            color: #00f3ff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="news-box">
    <h1>Güncel Yapay Zeka Haberleri</h1>

    <?php if (empty($articles)): ?>
        <p style="text-align:center; color:#aaa;">
            Haberler şu anda yüklenemedi. API key veya bağlantı kontrol edilmeli.
        </p>
    <?php else: ?>
        <?php foreach ($articles as $article): ?>
            <div class="news-card">
                <h3><?= esc($article['title'] ?? 'Başlık yok') ?></h3>
                <p><?= esc($article['description'] ?? 'Açıklama bulunamadı.') ?></p>
                <a href="<?= esc($article['url'] ?? '#') ?>" target="_blank">
                    Haberi Görüntüle
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="<?= base_url() ?>" class="btn-back">Ana Sayfaya Dön</a>
</div>

</body>
</html>