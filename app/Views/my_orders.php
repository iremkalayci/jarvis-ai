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
            max-width: 1050px;
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
            padding: 17px;
            text-align: center;
            border-top: 1px solid rgba(0,243,255,0.15);
            border-bottom: 1px solid rgba(0,243,255,0.15);
        }

        .status {
            color: #00f3ff;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(0,243,255,0.45);
        }

        .btn-back {
            display: inline-block;
            margin-top: 30px;
            color: #00f3ff;
            border: 1px solid #00f3ff;
            padding: 12px 26px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #00f3ff;
            color: #000;
            box-shadow: 0 0 18px rgba(0,243,255,0.45);
        }

        .empty-box {
            text-align: center;
            color: #ccc;
            padding: 35px;
            border: 1px dashed rgba(0,243,255,0.35);
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="orders-box">
    <h1>Siparişlerim</h1>

    <?php if (empty($orders)): ?>
        <div class="empty-box">
            Henüz siparişiniz bulunmuyor.
        </div>
    <?php else: ?>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Sipariş No</th>
                    <th>Toplam Tutar</th>
                    <th>Durum</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?= esc($order['id']) ?></td>
                        <td><?= number_format($order['total_price'], 2, ',', '.') ?> TL</td>
                        <td class="status"><?= esc($order['status']) ?></td>
                        <td><?= esc($order['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="<?= base_url() ?>" class="btn-back">
        <i class="bi bi-arrow-left"></i> Ana Sayfaya Dön
    </a>
</div>

</body>
</html>