<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Siparişlerim - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        body {
            background: #050505;
            color: white;
            padding: 60px;
            font-family: Arial, sans-serif;
        }

        .box {
            max-width: 1000px;
            margin: auto;
            background: rgba(255,255,255,0.04);
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 35px;
        }

        h1 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            color: white !important;
        }

        th {
            color: #00f3ff;
        }

        .status {
            color: #00f3ff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Siparişlerim</h1>

    <?php if (empty($orders)): ?>
        <p class="text-center">Henüz siparişiniz bulunmuyor.</p>
    <?php else: ?>
        <table class="table table-dark table-bordered text-center">
            <thead>
                <tr>
                    <th>Sipariş No</th>
                    <th>Tutar</th>
                    <th>Adres</th>
                    <th>Telefon</th>
                    <th>Durum</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?= esc($order['id']) ?></td>
                        <td><?= number_format($order['total_price'], 2, ',', '.') ?> TL</td>
                        <td><?= esc($order['address']) ?></td>
                        <td><?= esc($order['phone']) ?></td>
                        <td class="status"><?= esc($order['status']) ?></td>
                        <td><?= esc($order['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?= base_url('/') ?>" class="btn btn-outline-info">Ana Sayfaya Dön</a>
    </div>
</div>

</body>
</html>