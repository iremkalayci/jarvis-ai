<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürünlerimiz - Jarvis AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url('assets/img/gemini.png') ?>" rel="icon">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .product-disabled {
    position: relative;
    opacity: 0.72;
    border-color: rgba(255, 77, 109, 0.22) !important;
}


.stock-badge {
    display: inline-block;
    margin-top: 8px;
    color: #ff4d6d;
    border: 1px solid rgba(255,77,109,0.55);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
}

.btn-disabled {
    background: rgba(255,77,109,0.08);
    color: #ff6b88 !important;
    border: 1px solid rgba(255,77,109,0.35) !important;
}

.btn-disabled:hover {
    background: transparent !important;
    color: #ff4d6d !important;
    box-shadow: none !important;
}
        .product-img {
    width: 100%;
    height: 135px;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 18px;
    border: 1px solid rgba(0,243,255,0.22);
    background: rgba(255,255,255,0.03);
}

.product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
        body {
            background: #050505;
            color: #fff;
            font-family: "Rajdhani", sans-serif;
            padding-top: 95px;
        }

        .products-header {
            padding: 50px 0 30px;
            border-bottom: 1px solid rgba(0,243,255,0.12);
        }

        .products-header h1 {
            font-family: "Orbitron", sans-serif;
            color: #fff;
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .products-header span {
            color: #00f3ff;
        }

        .products-header p {
            color: #aaa;
            font-size: 18px;
        }

        .top-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 78px;
            background: rgba(0,0,0,0.92);
            border-bottom: 1px solid rgba(0,243,255,0.15);
            z-index: 1000;
        }

        .top-nav .nav-inner {
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: #fff;
            font-family: "Orbitron", sans-serif;
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo span {
            color: #00f3ff;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .nav-btn {
            color: #00f3ff;
            border: 1px solid #00f3ff;
            border-radius: 30px;
            padding: 8px 18px;
            text-decoration: none;
            font-family: "Orbitron", sans-serif;
            font-size: 13px;
            transition: 0.3s;
        }

        .nav-btn:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0,243,255,0.45);
        }

        .products-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin: 35px 0 28px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 260px;
        }

        .search-box input {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(0,243,255,0.35);
            color: #fff;
            border-radius: 12px;
            padding: 13px 16px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #00f3ff;
            box-shadow: 0 0 14px rgba(0,243,255,0.22);
        }

        .product-count {
            color: #00f3ff;
            font-family: "Orbitron", sans-serif;
            font-size: 14px;
        }

       .products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    padding-bottom: 70px;
}

.product-card {
    background: rgba(255,255,255,0.025);
    border: 1px solid rgba(0,243,255,0.22);
    border-radius: 18px;
    padding: 24px;
    min-height: 285px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: 0.25s ease;
}

.product-card:hover {
    transform: translateY(-4px);
    border-color: rgba(0,243,255,0.55);
    box-shadow: 0 0 22px rgba(0,243,255,0.14);
    background: rgba(255,255,255,0.035);
}

.product-top {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 18px;
}

.product-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border: 1px solid rgba(0,243,255,0.7);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #00f3ff;
    font-size: 22px;
    background: rgba(0,243,255,0.045);
}

.product-title-area h3 {
    font-family: "Orbitron", sans-serif;
    color: #fff;
    font-size: 16px;
    margin: 2px 0 0;
    line-height: 1.35;
}

.product-badge {
    display: none;
}

.product-card p {
    color: rgba(255,255,255,0.58);
    font-size: 14px;
    line-height: 1.55;
    min-height: 58px;
    margin-bottom: 14px;
}

.product-bottom {
    margin-top: 12px;
}

.product-price {
    color: #00f3ff !important;
    font-family: "Orbitron", sans-serif;
    font-size: 17px !important;
    font-weight: 700;
    margin-bottom: 18px !important;
    letter-spacing: 0.5px;
}

.product-actions {
    display: flex;
    gap: 10px;
}

.product-actions a {
    flex: 1;
    text-align: center;
    font-family: "Orbitron", sans-serif;
    font-size: 12px;
    padding: 10px 8px;
    border-radius: 9px;
    text-decoration: none;
    transition: 0.25s;
}

.btn-detail {
    color: #00f3ff;
    border: 1px solid rgba(0,243,255,0.6);
    background: transparent;
}

.btn-cart {
    color: #ffffff;
    border: 1px solid rgba(0,243,255,0.6);
    background: rgba(0,243,255,0.09);
}

.btn-detail:hover,
.btn-cart:hover {
    background: #00f3ff;
    color: #000;
    box-shadow: 0 0 16px rgba(0,243,255,0.35);
}

@media (max-width: 1200px) {
    .products-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 500px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
}

            .products-header h1 {
                font-size: 30px;
            }
        }

        @media (max-width: 500px) {
            .products-grid {
                grid-template-columns: 1fr;
            }    gap: 12px;
    margin-bottom: 14px;
}

.product-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border: 1px solid #00f3ff;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #00f3ff;
    font-size: 23px;
    box-shadow: 0 0 14px rgba(0,243,255,0.22);
}

.product-title-area h3 {
    font-family: "Orbitron", sans-serif;
    color: #fff;
    font-size: 15px;
    margin: 0 0 6px;
    line-height: 1.3;
}

.product-badge {
    display: inline-block;
    color: #00ff64;
    border: 1px solid rgba(0,255,100,0.45);
    border-radius: 20px;
    padding: 2px 8px;
    f

            .nav-inner {
                gap: 10px;
            }

            .nav-actions {
                gap: 8px;
            }

            .nav-btn {
                padding: 7px 12px;
                font-size: 11px;
            }
        }
    </style>
</head>
<body>

<header class="top-nav">
    <div class="container nav-inner">
        <a href="<?= base_url('/') ?>" class="logo">JARVIS AI<span>.</span></a>

        <div class="nav-actions">
            <a href="<?= base_url('/') ?>" class="nav-btn">
                <i class="bi bi-house"></i> Ana Sayfa
            </a>

            <a href="<?= base_url('sepet') ?>" class="nav-btn">
                <i class="bi bi-cart3"></i> Sepetim
            </a>
        </div>
    </div>
</header>

<section class="products-header">
    <div class="container">
        <h1>Ürünlerimiz<span>.</span></h1>
        <p>JARVIS AI yapay zeka çözümleri ve kurumsal yazılım paketleri</p>
    </div>
</section>

<main class="container">
    <div class="products-toolbar">
        <div class="search-box">
            <input type="text" id="productSearch" placeholder="Ürün ara...">
        </div>

        <div class="product-count">
            <?= count($products) ?> ürün listeleniyor
        </div>
    </div>

    <div class="products-grid" id="productsGrid">
       <?php foreach ($products as $product): ?>
    <?php
        $title = strtolower($product['title']);
        $icon = 'bi-cpu';
        $category = 'AI Yazılım';

        if (str_contains($title, 'nlp') || str_contains($title, 'chat') || str_contains($title, 'sentiment')) {
            $icon = 'bi-chat-dots';
            $category = 'NLP';
        } elseif (str_contains($title, 'vision') || str_contains($title, 'face')) {
            $icon = 'bi-eye';
            $category = 'Vision';
        } elseif (str_contains($title, 'security') || str_contains($title, 'shield') || str_contains($title, 'fraud') || str_contains($title, 'secure')) {
            $icon = 'bi-shield-lock';
            $category = 'Security';
        } elseif (str_contains($title, 'data') || str_contains($title, 'analytics') || str_contains($title, 'predict') || str_contains($title, 'market') || str_contains($title, 'risk')) {
            $icon = 'bi-graph-up-arrow';
            $category = 'Analytics';
        } elseif (str_contains($title, 'rpa') || str_contains($title, 'auto') || str_contains($title, 'bot')) {
            $icon = 'bi-robot';
            $category = 'Automation';
        } elseif (str_contains($title, 'voice')) {
            $icon = 'bi-mic';
            $category = 'Voice AI';
        } elseif (str_contains($title, 'docu') || str_contains($title, 'ocr') || str_contains($title, 'legal')) {
            $icon = 'bi-file-earmark-text';
            $category = 'Document AI';
        } elseif (str_contains($title, 'cloud')) {
            $icon = 'bi-cloud-check';
            $category = 'Cloud';
        } elseif (str_contains($title, 'health')) {
            $icon = 'bi-heart-pulse';
            $category = 'Health AI';
        }
    ?>

   <?php 
    $isAvailable = (($product['is_active'] ?? 1) == 1) && (($product['stock'] ?? 0) > 0);
?>

<div class="product-card <?= !$isAvailable ? 'product-disabled' : '' ?>" data-title="<?= strtolower(esc($product['title'])) ?>">
    <div>
       
        <div class="product-top">
            <div class="product-icon">
                <i class="bi <?= $icon ?>"></i>
            </div>

            <div class="product-title-area">
                <h3><?= esc($product['title']) ?></h3>
                <?php if (!$isAvailable): ?>
    <span class="stock-badge">
        Stokta Yok
    </span>
<?php endif; ?>
            </div>
        </div>

        <p><?= esc($product['description']) ?></p>
    </div>

        <div class="product-bottom">
            <p class="product-price">
                <?= number_format($product['price'], 2, ',', '.') ?> TL
            </p>

            <div class="product-actions">
               <a href="<?= base_url('urun/' . $product['id']) ?>" class="btn-detail">
    Detay
</a>
<?php if ($isAvailable): ?>
    <a href="<?= base_url('sepete-ekle/' . $product['id']) ?>" class="btn-cart">
        Sepete Ekle
    </a>
<?php else: ?>
    <span class="btn-cart btn-disabled">
        Stokta Yok
    </span>
<?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    </div>
</main>

<script>
    const searchInput = document.getElementById('productSearch');
    const cards = document.querySelectorAll('.product-card');

    searchInput.addEventListener('input', function () {
        const value = this.value.toLowerCase();

        cards.forEach(function(card) {
            const title = card.dataset.title;

            if (title.includes(value)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>