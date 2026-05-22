<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Yönetimi - Jarvis AI</title>

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
            max-width: 1200px;
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
            border-color: rgba(0,243,255,0.25) !important;
        }

        .table thead th {
            color: #00f3ff;
            background: rgba(0,243,255,0.08);
            border-color: rgba(0,243,255,0.25) !important;
        }

        .table tbody td {
            background: rgba(255,255,255,0.025);
            border-color: rgba(0,243,255,0.16) !important;
            vertical-align: middle;
        }

        .btn-area {
            display: flex;
            justify-content: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .btn-sm {
            border-radius: 20px;
            font-size: 12px;
            padding: 6px 12px;
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 12px;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

<div class="admin-box">
    <h1>Kullanıcı Yönetimi</h1>

    <div class="top-actions">
        <a href="<?= base_url('admin') ?>" class="btn btn-outline-info">
            <i class="bi bi-arrow-left"></i> Admin Panele Dön
        </a>

        <a href="<?= base_url('admin/kullanici-ekle') ?>" class="btn btn-info">
            <i class="bi bi-person-plus"></i> Yeni Kullanıcı Ekle
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Bakiye</th>
                    <th>Adres</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>#<?= esc($user['id']) ?></td>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['role']) ?></td>
                        <td><?= number_format($user['balance'] ?? 0, 2, ',', '.') ?> TL</td>
                        <td><?= esc($user['address'] ?? '-') ?></td>

                        <td>
                            <?php if (($user['is_frozen'] ?? 0) == 1): ?>
                                <span class="badge bg-secondary">Dondurulmuş</span>
                            <?php else: ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="btn-area">
                                <?php if (($user['is_frozen'] ?? 0) == 1): ?>
                                    <a href="<?= base_url('admin/kullanici-aktif/' . $user['id']) ?>" class="btn btn-success btn-sm">
                                        Aktif Et
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/kullanici-dondur/' . $user['id']) ?>" class="btn btn-warning btn-sm">
                                        Dondur
                                    </a>
                                <?php endif; ?>

                                <?php if ((int)$user['id'] !== (int)session()->get('id')): ?>
                                    <a href="<?= base_url('admin/kullanici-sil/' . $user['id']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')">
                                        Sil
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Kendi hesabın</span>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

</body>
</html>