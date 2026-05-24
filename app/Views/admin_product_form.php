<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $product ? 'Ürün Düzenle' : 'Ürün Ekle' ?> - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body style="background:#050505; color:white; padding:50px;">

<div class="container" style="max-width:800px; border:1px solid #00f3ff; border-radius:20px; padding:35px; background:rgba(255,255,255,0.03);">
    <h1 style="color:#00f3ff; text-align:center;">
        <?= $product ? 'Ürün Düzenle' : 'Yeni Ürün Ekle' ?>
    </h1>

    <form 
        action="<?= $product ? base_url('admin/urun-guncelle/' . $product['id']) : base_url('admin/urun-kaydet') ?>" 
        method="post"
        enctype="multipart/form-data"
        class="mt-4"
    >
        <label>Ürün Adı</label>
        <input 
            type="text" 
            name="title" 
            class="form-control mb-3" 
            value="<?= esc($product['title'] ?? '') ?>" 
            required
        >

        <label>Açıklama</label>
        <textarea 
            name="description" 
            class="form-control mb-3" 
            rows="4" 
            required
        ><?= esc($product['description'] ?? '') ?></textarea>
        <label>Detay Açıklaması</label>
<textarea
    name="long_description"
    class="form-control mb-3"
    rows="6"
><?= esc($product['long_description'] ?? '') ?></textarea>

        <label>Fiyat</label>
        <input 
            type="number" 
            step="0.01" 
            name="price" 
            class="form-control mb-3" 
            value="<?= esc($product['price'] ?? '') ?>" 
            required
        >

        <label>Stok / Adet</label>
        <input 
            type="number" 
            name="stock" 
            class="form-control mb-3" 
            value="<?= esc($product['stock'] ?? 10) ?>" 
            required
        >

        <?php if (!empty($product['image'])): ?>
            <div class="mb-3 text-center">
                <p style="color:#00f3ff;">Mevcut Görsel</p>
                <img 
                    src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                    style="max-width:220px; height:130px; object-fit:cover; border:1px solid #00f3ff; border-radius:12px;"
                    alt="<?= esc($product['title']) ?>"
                >
            </div>

            <div class="form-check mb-3 text-center">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    name="delete_image" 
                    value="1" 
                    id="delete_image"
                >
                <label class="form-check-label" for="delete_image">
                    Mevcut görseli sil
                </label>
            </div>
        <?php endif; ?>

        <label>Ürün Görseli</label>
        <input 
            type="file" 
            name="image" 
            class="form-control mb-3" 
            accept="image/*"
        >

        <div class="form-check mb-4">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="is_active" 
                id="is_active"
                value="1"
                <?= (($product['is_active'] ?? 1) == 1) ? 'checked' : '' ?>
            >
            <label class="form-check-label" for="is_active">
                Satışta
            </label>
        </div>

        <button type="submit" class="btn btn-info w-100">
            Kaydet
        </button>

        <a href="<?= base_url('admin/urunler') ?>" class="btn btn-outline-info w-100 mt-3">
            Geri Dön
        </a>
    </form>
</div>

</body>
</html>