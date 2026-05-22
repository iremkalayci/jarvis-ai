<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Kullanıcı Ekle - Jarvis AI</title>

    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            background: #050505;
            color: #fff;
            padding: 50px 20px;
        }

        .form-box {
            max-width: 800px;
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

        label {
            color: #00f3ff;
            margin-top: 12px;
        }

        .form-control,
        .form-select {
            background: #101010;
            color: #fff;
            border: 1px solid rgba(0,243,255,0.45);
        }

        .form-control:focus,
        .form-select:focus {
            background: #111;
            color: #fff;
            border-color: #00f3ff;
            box-shadow: 0 0 12px rgba(0,243,255,0.25);
        }
    </style>
</head>

<body>

<div class="form-box">
    <h1>Yeni Kullanıcı Ekle</h1>

    <form action="<?= base_url('admin/kullanici-kaydet') ?>" method="post">

        <label>Ad Soyad</label>
        <input type="text" name="name" class="form-control mb-3" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label>Şifre</label>
        <input type="password" name="password" class="form-control mb-3" required>

        <label>Rol</label>
        <select name="role" class="form-select mb-3">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <label>Bakiye</label>
        <input type="number" step="0.01" name="balance" class="form-control mb-3" value="0">

        <label>Adres</label>
        <textarea name="address" class="form-control mb-3" rows="3"></textarea>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="is_frozen" value="1" id="is_frozen">
            <label class="form-check-label" for="is_frozen">
                Hesap dondurulmuş olarak oluşturulsun
            </label>
        </div>

        <button type="submit" class="btn btn-info w-100">
            Kullanıcıyı Kaydet
        </button>

        <a href="<?= base_url('admin/kullanicilar') ?>" class="btn btn-outline-info w-100 mt-3">
            Geri Dön
        </a>
    </form>
</div>

</body>
</html>