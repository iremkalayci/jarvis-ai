<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= esc($product['title']) ?> - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050505; color: #fff; font-family: 'Orbitron', sans-serif; padding-top: 100px; }
        .product-container { background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.2); padding: 40px; border-radius: 15px; box-shadow: 0 0 20px rgba(0,243,255,0.1); }
        .product-title { color: #00f3ff; font-weight: 700; font-size: 36px; letter-spacing: 2px; margin-bottom: 20px;}
        .product-price { color: #fff; font-size: 28px; font-weight: 900; background: rgba(0,243,255,0.1); display: inline-block; padding: 10px 20px; border-radius: 10px; border: 1px solid rgba(0,243,255,0.3); margin-bottom: 30px;}
        .product-desc { font-family: sans-serif; font-size: 16px; line-height: 1.8; color: #ccc; margin-bottom: 40px;}
        .btn-add { background: #00f3ff; color: #000; padding: 15px 40px; border-radius: 50px; font-weight: bold; text-decoration: none; font-size: 18px; transition: 0.3s; display: inline-block;}
        .btn-add:hover { box-shadow: 0 0 20px rgba(0, 243, 255, 0.6); color: #000; transform: scale(1.05);}
        .btn-back { background: transparent; color: #888; border: 1px solid #888; padding: 15px 30px; border-radius: 50px; text-decoration: none; transition: 0.3s; margin-right: 15px; display: inline-block;}
        .btn-back:hover { color: #fff; border-color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row product-container align-items-center">
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <img src="<?= base_url('assets/img/' . $product['image_url']) ?>" alt="<?= esc($product['title']) ?>" style="max-width: 100%; border-radius: 15px; box-shadow: 0 0 20px rgba(0,243,255,0.2);">
            </div>
            
            <div class="col-lg-6">
                <h1 class="product-title"><?= esc($product['title']) ?></h1>
                <div class="product-price"><?= number_format($product['price'], 2, ',', '.') ?> TL</div>
                <p class="product-desc"><?= esc($product['description']) ?></p>
                
                <div class="mt-4">
                    <a href="<?= base_url() ?>" class="btn-back">Geri Dön</a>
                    <a href="<?= base_url('sepete-ekle/' . $product['id']) ?>" class="btn-add">SEPETE EKLE</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>