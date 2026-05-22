<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Fatura - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        body{
            background:#050505;
            color:white;
            padding:50px;
            font-family:Arial;
        }

        .invoice-box{
            max-width:900px;
            margin:auto;
            border:1px solid #00f3ff;
            border-radius:20px;
            padding:40px;
            background:rgba(255,255,255,0.03);
        }

        h1{
            color:#00f3ff;
            margin-bottom:30px;
        }

        table{
            width:100%;
            margin-top:25px;
        }

        th, td{
            padding:14px;
            border-bottom:1px solid rgba(0,243,255,0.2);
        }

        th{
            color:#00f3ff;
        }

        .total{
            margin-top:25px;
            text-align:right;
            font-size:22px;
            color:#00f3ff;
        }

        .btn-back{
            display:inline-block;
            margin-top:30px;
            padding:10px 20px;
            border:1px solid #00f3ff;
            color:#00f3ff;
            border-radius:12px;
            text-decoration:none;
        }
    </style>
</head>
<body>

<div class="invoice-box">

    <h1>Fatura</h1>

    <p><strong>Sipariş No:</strong> #<?= $order['id'] ?></p>
    <p><strong>Tarih:</strong> <?= $order['created_at'] ?></p>
    <p><strong>Adres:</strong> <?= esc($order['address']) ?></p>
    <p><strong>Telefon:</strong> <?= esc($order['phone']) ?></p>

    <table>
        <thead>
            <tr>
                <th>Ürün</th>
                <th>Adet</th>
                <th>Fiyat</th>
                <th>Ara Toplam</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td><?= esc($item['product_title']) ?></td>
                <td><?= esc($item['quantity']) ?></td>
                <td><?= number_format($item['price'],2,',','.') ?> TL</td>
                <td><?= number_format($item['subtotal'],2,',','.') ?> TL</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">
        Toplam:
        <?= number_format($order['total_price'],2,',','.') ?> TL
    </div>

    <a href="<?= base_url('siparislerim') ?>" class="btn-back">
        Geri Dön
    </a>

</div>

</body>
</html>