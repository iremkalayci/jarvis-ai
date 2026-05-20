<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Sepetim - Jarvis AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top, rgba(0, 243, 255, 0.10), transparent 35%),
                        linear-gradient(135deg, #020202 0%, #050505 45%, #001014 100%);
            color: #fff;
            font-family: "Rajdhani", sans-serif;
        }

        .cart-page {
            min-height: 100vh;
            padding: 70px 20px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .cart-box {
            width: 100%;
            max-width: 1250px;
            background: rgba(5, 5, 5, 0.92);
            border: 1px solid rgba(0, 243, 255, 0.35);
            border-radius: 22px;
            padding: 38px 34px;
            box-shadow: 0 0 35px rgba(0, 243, 255, 0.12),
                        inset 0 0 22px rgba(0, 243, 255, 0.04);
        }

        .cart-title {
            font-family: "Orbitron", sans-serif;
            color: #00f3ff;
            text-align: center;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 3px;
            margin-bottom: 35px;
            text-transform: uppercase;
            text-shadow: 0 0 18px rgba(0, 243, 255, 0.55);
        }

        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 14px;
        }

        .cart-table thead th {
            font-family: "Orbitron", sans-serif;
            color: #00f3ff;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid rgba(0, 243, 255, 0.45);
            text-transform: uppercase;
        }

        .cart-table tbody tr {
            background: rgba(255, 255, 255, 0.035);
            box-shadow: 0 0 14px rgba(0, 243, 255, 0.06);
        }

        .cart-table tbody td {
            color: #fff;
            padding: 18px 14px;
            text-align: center;
            vertical-align: middle;
            font-size: 20px;
            font-weight: 600;
            border-top: 1px solid rgba(0, 243, 255, 0.10);
            border-bottom: 1px solid rgba(0, 243, 255, 0.10);
        }

        .product-name {
            font-family: "Orbitron", sans-serif;
            color: #fff;
        }

        .price {
            color: #00f3ff;
            font-weight: 700;
        }

        .qty-control {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .qty-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid #00f3ff;
            color: #00f3ff;
            background: rgba(0, 243, 255, 0.08);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-family: "Orbitron", sans-serif;
            font-size: 18px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .qty-btn:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.5);
        }

        .quantity-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 34px;
            border-radius: 999px;
            background: rgba(0, 243, 255, 0.12);
            border: 1px solid rgba(0, 243, 255, 0.4);
            color: #00f3ff;
            font-family: "Orbitron", sans-serif;
            font-size: 15px;
        }

        .cart-summary {
            display: flex;
            justify-content: flex-end;
            margin-top: 28px;
        }

        .total-text {
            font-family: "Orbitron", sans-serif;
            font-size: 28px;
            color: #fff;
        }

        .total-text span {
            color: #00f3ff;
            text-shadow: 0 0 14px rgba(0, 243, 255, 0.45);
        }

        .cart-actions {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .btn-neon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 170px;
            padding: 12px 22px;
            border-radius: 999px;
            border: 1px solid #00f3ff;
            background: rgba(0, 243, 255, 0.12);
            color: #00f3ff;
            font-family: "Orbitron", sans-serif;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .btn-neon:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 20px rgba(0, 243, 255, 0.55);
            transform: translateY(-2px);
        }

        .btn-danger-neon {
            min-width: 105px;
            border-color: #ff315a;
            color: #ff315a;
            background: rgba(255, 49, 90, 0.08);
        }

        .btn-danger-neon:hover {
            background: #ff315a;
            color: #fff;
            box-shadow: 0 0 18px rgba(255, 49, 90, 0.45);
        }

        .btn-ghost {
            background: transparent;
            border-color: rgba(255, 255, 255, 0.45);
            color: rgba(255, 255, 255, 0.75);
        }

        .empty-cart {
            text-align: center;
            padding: 55px 20px;
            border: 1px dashed rgba(0, 243, 255, 0.35);
            border-radius: 18px;
            background: rgba(0, 243, 255, 0.04);
        }

        .empty-cart h2 {
            font-family: "Orbitron", sans-serif;
            color: #fff;
            margin-bottom: 12px;
        }

        .empty-cart p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .cart-box {
                padding: 25px 16px;
            }

            .cart-title {
                font-size: 24px;
            }

            .cart-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .cart-summary,
            .cart-actions {
                justify-content: center;
            }

            .total-text {
                font-size: 22px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<main class="cart-page">
    <div class="cart-box">

        <h1 class="cart-title">
            <i class="bi bi-cart3"></i> Alışveriş Sepeti
        </h1>

        <?php if (empty($cart)): ?>

            <div class="empty-cart">
                <h2>Sepetiniz Boş</h2>
                <p>Henüz sepete ürün eklemediniz.</p>

                <a href="<?= base_url('/') ?>#urunler" class="btn-neon mt-3">
                    <i class="bi bi-arrow-left"></i> Ürünlere Git
                </a>
            </div>

        <?php else: ?>

            <div class="table-responsive">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Ürün Adı</th>
                            <th>Fiyat</th>
                            <th>Adet</th>
                            <th>Toplam</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $genelToplam = 0; ?>

                        <?php foreach ($cart as $key => $item): ?>
                            <?php
                                $quantity = $item['qty'] ?? 1;
                                $price = $item['price'] ?? 0;
                                $araToplam = $price * $quantity;
                                $genelToplam += $araToplam;

                                $productId = $item['id'] ?? $key;
                                $productTitle = $item['title'] ?? 'Ürün';
                            ?>

                            <tr>
                                <td class="product-name">
                                    <?= esc($productTitle) ?>
                                </td>

                                <td>
                                    <?= number_format($price, 2, ',', '.') ?> TL
                                </td>

                                <td>
                                    <div class="qty-control">
                                        <a href="<?= base_url('sepet-azalt/' . $productId) ?>" class="qty-btn">-</a>

                                        <span class="quantity-badge">
                                            <?= esc($quantity) ?>
                                        </span>

                                        <a href="<?= base_url('sepet-arttir/' . $productId) ?>" class="qty-btn">+</a>
                                    </div>
                                </td>

                                <td class="price">
                                    <?= number_format($araToplam, 2, ',', '.') ?> TL
                                </td>

                                <td>
                                    <a href="<?= base_url('sepetten-sil/' . $productId) ?>"
                                       class="btn-neon btn-danger-neon"
                                       onclick="return confirm('Bu ürünü tamamen sepetten silmek istiyor musun?')">
                                        <i class="bi bi-trash3"></i> Sil
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-summary">
                <div class="total-text">
                    Genel Toplam:
                    <span><?= number_format($genelToplam, 2, ',', '.') ?> TL</span>
                </div>
            </div>

            <div class="cart-actions">
                <a href="<?= base_url('/') ?>#urunler" class="btn-neon btn-ghost">
                    <i class="bi bi-arrow-left"></i> Alışverişe Devam Et
                </a>

                <a href="<?= base_url('sepeti-temizle') ?>"
                   class="btn-neon btn-danger-neon"
                   onclick="return confirm('Sepetin tamamını temizlemek istiyor musun?')">
                    <i class="bi bi-x-circle"></i> Sepeti Temizle
                </a>

                <a href="#" class="btn-neon">
                    <i class="bi bi-credit-card"></i> Siparişi Tamamla
                </a>
            </div>

        <?php endif; ?>

    </div>
</main>

<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>