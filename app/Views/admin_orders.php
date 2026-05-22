<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Siparişler - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #050505;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            padding: 50px 20px;
        }

        .admin-box {
            max-width: 1250px;
            margin: auto;
            border: 1px solid #00f3ff;
            border-radius: 20px;
            padding: 35px;
            background: rgba(255,255,255,0.03);
            box-shadow: 0 0 30px rgba(0,243,255,0.15);
        }

        h1 {
            color: #00f3ff;
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            color: #fff;
            border-color: rgba(0,243,255,0.25) !important;
        }

        .table thead th {
            color: #00f3ff;
            background: rgba(0,243,255,0.08);
            border-color: rgba(0,243,255,0.25) !important;
            vertical-align: middle;
        }

        .table tbody td {
            background: rgba(255,255,255,0.025);
            border-color: rgba(0,243,255,0.16) !important;
            vertical-align: middle;
        }

        .status-text {
            color: #00f3ff;
            font-weight: 700;
            font-size: 13px;
        }

        .btn-area {
            display: flex;
            gap: 6px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-sm {
            font-size: 12px;
            border-radius: 20px;
            padding: 6px 12px;
        }

        .btn-back {
            margin-top: 25px;
            border-radius: 30px;
            padding: 10px 22px;
        }
    </style>
</head>

<body>

<div class="admin-box">
    <h1>Sipariş Yönetimi</h1>

    <div class="table-responsive">
        <table class="table table-dark table-bordered text-center mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kullanıcı ID</th>
                    <th>Tutar</th>
                    <th>Telefon</th>
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
                        $isCancelled = isset($order['is_cancelled']) ? (int)$order['is_cancelled'] : 0;

                        $stepLabels = [
                            0 => 'Sipariş alındı',
                            1 => 'Ürünler tedarik ediliyor',
                            2 => 'Ürünler kutulanıyor',
                            3 => 'Kargoya veriliyor',
                            4 => 'Yola çıktı',
                            5 => 'Teslim edildi'
                        ];

                        $stepText = $stepLabels[$step] ?? 'Sipariş alındı';
                    ?>

                    <tr>
                        <td>#<?= esc($order['id']) ?></td>
                        <td><?= esc($order['user_id']) ?></td>
                        <td><?= number_format($order['total_price'], 2, ',', '.') ?> TL</td>
                        <td><?= esc($order['phone']) ?></td>
                        <td class="status-text"><?= esc($order['status']) ?></td>
                        <td><?= esc($stepText) ?></td>
                        <td><?= esc($order['created_at']) ?></td>
                        <td>
                            <div class="btn-area">
                                <?php if ($isCancelled == 0): ?>

                                    <a href="<?= base_url('admin/siparis-onayla/' . $order['id']) ?>" class="btn btn-success btn-sm">
                                        Onayla
                                    </a>

                                    <a href="<?= base_url('admin/siparis-ileri/' . $order['id']) ?>" class="btn btn-info btn-sm">
                                        İleri
                                    </a>

                                    <a href="<?= base_url('admin/siparis-iptal/' . $order['id']) ?>" class="btn btn-danger btn-sm">
                                        İptal
                                    </a>

                                <?php else: ?>

                                    <span class="text-danger">İptal edildi</span>

                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="<?= base_url('admin') ?>" class="btn btn-outline-info btn-back">
        <i class="bi bi-arrow-left"></i> Admin Panele Dön
    </a>
</div>

</body>
</html>