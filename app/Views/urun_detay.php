<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= esc($product['title']) ?> - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .product-long-description {
    color: #ffffff;
    font-size: 16px;
    line-height: 1.9;
    max-width: 620px;
    margin-top: 26px;
    white-space: normal;
}

.product-long-description br {
    display: block;
    margin-bottom: 12px;
    content: "";
}
        .product-detail-img {
    width: 100%;
    max-width: 560px;
    height: 330px;
    object-fit: cover;
    border-radius: 14px;
    border: 1px solid rgba(0,243,255,0.25);
    box-shadow: 0 0 25px rgba(0,243,255,0.18);
    display: block;
}
.btn-buy{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:220px;
    height:58px;
    padding:0 32px;

    border-radius:14px;
    border:1px solid #00f3ff;

    background: linear-gradient(135deg,#00eaff,#00c8ff);
    color:#041014;

    font-size:20px;
    font-weight:700;
    text-decoration:none;
    letter-spacing:.5px;

    box-shadow: 0 0 18px rgba(0,243,255,.22);
    transition:.25s ease;
}
.btn-buy:hover{
    transform: translateY(-2px);
    box-shadow: 0 0 28px rgba(0,243,255,.35);
    color:#041014;
}
.product-detail-placeholder {
    width: 100%;
    max-width: 560px;
    height: 330px;
    border-radius: 14px;
    border: 1px solid rgba(0,243,255,0.25);
    background: rgba(0,243,255,0.04);
    color: #00f3ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 75px;
    box-shadow: 0 0 25px rgba(0,243,255,0.12);
}
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
                <?php if (!empty($product['image'])): ?>
    <img 
        src="<?= base_url('uploads/products/' . $product['image']) ?>" 
        alt="<?= esc($product['title']) ?>"
        class="product-detail-img"
    >
<?php else: ?>
    <div class="product-detail-placeholder">
        <i class="bi bi-cpu"></i>
    </div>
<?php endif; ?>
            </div>
            
            <div class="col-lg-6">
                <h1 class="product-title"><?= esc($product['title']) ?></h1>
                <div class="product-price"><?= number_format($product['price'], 2, ',', '.') ?> TL</div>
               <div class="product-long-description">
    <?= nl2br(esc($product['long_description'] ?: $product['short_description'])) ?>
</div>
                
                <div class="mt-4">
                   <?php
    $isAvailable = (($product['is_active'] ?? 1) == 1) && (($product['stock'] ?? 0) > 0);
?>

<?php if ($isAvailable): ?>
    <a href="<?= base_url('sepete-ekle/' . $product['id']) ?>" class="btn-buy">
        SEPETE EKLE
    </a>
<?php else: ?>
    <span class="btn-buy btn-disabled">
        STOKTA YOK
    </span>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>