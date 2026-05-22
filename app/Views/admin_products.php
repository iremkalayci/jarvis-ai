<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Yönetimi - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
</head>

<body style="background:#050505; color:white; padding:50px;">

<div class="container" style="border:1px solid #00f3ff; border-radius:20px; padding:35px; background:rgba(255,255,255,0.03);">
    <h1 style="color:#00f3ff; text-align:center;">Ürün Yönetimi</h1>

    <div class="d-flex justify-content-between mt-4 mb-3">
        <a href="<?= base_url('admin') ?>" class="btn btn-outline-info">
            <i class="bi bi-arrow-left"></i> Admin Panele Dön
        </a>

        <a href="<?= base_url('admin/urun-ekle') ?>" class="btn btn-info">
            <i class="bi bi-plus-circle"></i> Yeni Ürün Ekle
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ürün</th>
                    <th>Fiyat</th>
                    <th>Stok</th>
                    <th>Durum</th>
                    <th>Görsel</th>
                    <th>İşlem</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>#<?= esc($product['id']) ?></td>

                        <td>
                            <strong><?= esc($product['title']) ?></strong><br>
                            <small><?= esc($product['description']) ?></small>
                        </td>

                        <td><?= number_format($product['price'], 2, ',', '.') ?> TL</td>

                        <td><?= esc($product['stock'] ?? 0) ?></td>

                        <td>
                            <?php if (($product['is_active'] ?? 1) == 1): ?>
                                <span class="badge bg-success">Satışta</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Satışta Değil</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($product['image'] ?? '-') ?></td>

                        <td>
                            <a href="<?= base_url('admin/urun-duzenle/' . $product['id']) ?>" class="btn btn-warning btn-sm">
                                Düzenle
                            </a>

                            <a href="<?= base_url('admin/urun-durum/' . $product['id']) ?>" class="btn btn-info btn-sm">
                                Durum
                            </a>

                            <a href="<?= base_url('admin/urun-sil/' . $product['id']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bu ürünü silmek istiyor musun?')">
                                Sil
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

</body>
</html>