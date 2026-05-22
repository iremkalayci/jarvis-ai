<?php
$stepLabels = [
    0 => 'Sipariş alındı',
    1 => 'Ürünleriniz tedarik ediliyor',
    2 => 'Ürünleriniz kutulanıyor',
    3 => 'Ürünleriniz kargoya veriliyor',
    4 => 'Ürünleriniz size doğru yola çıktı',
    5 => 'Ürünleriniz size teslim edilmiştir'
];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Siparişlerim - Jarvis AI</title>

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

        .orders-box {
            max-width: 1150px;
            margin: auto;
            background: rgba(255,255,255,0.03);
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 30px rgba(0,243,255,0.15);
        }

        h1 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 35px;
        }

        .balance-box {
            text-align: center;
            color: #00f3ff;
            margin-bottom: 25px;
            font-size: 18px;
        }

        .orders-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .orders-table th {
            color: #00f3ff;
            background: rgba(0,243,255,0.08);
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(0,243,255,0.4);
        }

        .orders-table td {
            color: #fff;
            background: rgba(255,255,255,0.04);
            padding: 15px;
            text-align: center;
            border-top: 1px solid rgba(0,243,255,0.15);
            border-bottom: 1px solid rgba(0,243,255,0.15);
            vertical-align: middle;
        }

        .status {
            color: #00f3ff;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(0,243,255,0.45);
        }

        .btn-neon {
            display: inline-block;
            color: #00f3ff;
            border: 1px solid #00f3ff;
            padding: 8px 16px;
            border-radius: 25px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 13px;
        }

        .btn-neon:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0,243,255,0.45);
        }

        .btn-cancel {
            color: #ff4d6d;
            border-color: #ff4d6d;
        }

        .btn-cancel:hover {
            background: #ff4d6d;
            color: #000;
            box-shadow: 0 0 18px rgba(255,77,109,0.45);
        }

        .empty-box {
            text-align: center;
            color: #ccc;
            padding: 35px;
            border: 1px dashed rgba(0,243,255,0.35);
            border-radius: 15px;
        }

        .back-area {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="orders-box">
    <h1>Siparişlerim</h1>

    <div class="balance-box">
        Hesap Bakiyesi: <?= number_format(session()->get('balance') ?? 0, 2, ',', '.') ?> TL
    </div>

    <?php if (empty($orders)): ?>
        <div class="empty-box">
            Henüz siparişiniz bulunmuyor.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Sipariş No</th>
                        <th>Toplam Tutar</th>
                        <th>Durum</th>
                        <th>Aşama</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <?php
                            $step = isset($order['order_step']) ? (int)$order['order_step'] : 0;
                            $isApproved = isset($order['is_approved']) ? (int)$order['is_approved'] : 0;
                            $isCancelled = isset($order['is_cancelled']) ? (int)$order['is_cancelled'] : 0;
                            $isDelivered = isset($order['is_delivered']) ? (int)$order['is_delivered'] : 0;
                            $stepText = $stepLabels[$step] ?? 'Sipariş alındı';
                        ?>

                        <tr>
                            <td>#<?= esc($order['id']) ?></td>

                            <td>
                                <?= number_format($order['total_price'], 2, ',', '.') ?> TL
                            </td>

                            <td class="status">
                                <?= esc($order['status']) ?>
                            </td>

                            <td>
                                <?= esc($stepText) ?>
                            </td>

                            <td>
                                <?= esc($order['created_at']) ?>
                            </td>

                            <td>
                                <?php if ($isCancelled === 1): ?>

                                    <span style="color:#ff4d6d;">İptal edildi</span>

                                <?php elseif ($isApproved === 0): ?>

                                    <a href="<?= base_url('siparis-iptal/' . $order['id']) ?>" 
                                       class="btn-neon btn-cancel"
                                       onclick="return confirm('Siparişi iptal etmek istiyor musunuz? Tutar hesabınıza bakiye olarak iade edilir.')">
                                        İptal Et
                                    </a>

                                <?php elseif ($step >= 5 && $isDelivered === 0): ?>

                                    <a href="<?= base_url('teslim-aldim/' . $order['id']) ?>" 
                                       class="btn-neon">
                                        Ürünlerimi Teslim Aldım
                                    </a>

                                <?php elseif ($isDelivered === 1): ?>

                                    <span style="color:#00f3ff;">Teslim alındı</span>

                                <?php else: ?>

                                    <span style="color:#888;">Takipte</span>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="back-area">
        <a href="<?= base_url() ?>" class="btn-neon">
            <i class="bi bi-arrow-left"></i> Ana Sayfaya Dön
        </a>
    </div>
</div>

</body>
</html>