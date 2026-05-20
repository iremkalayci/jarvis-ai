<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050505; color: #fff; font-family: 'Orbitron', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-image: radial-gradient(circle at center, #111 0%, #000 100%); }
        .login-box { background: rgba(255,255,255,0.02); border: 1px solid rgba(0,243,255,0.2); padding: 40px; border-radius: 15px; width: 100%; max-width: 400px; box-shadow: 0 0 20px rgba(0,243,255,0.1); backdrop-filter: blur(10px); }
        .login-box h2 { color: #00f3ff; text-align: center; margin-bottom: 30px; font-weight: 700; letter-spacing: 2px; }
        .form-control { background: rgba(0,0,0,0.5); border: 1px solid rgba(0,243,255,0.3); color: #fff; border-radius: 5px; margin-bottom: 20px; padding: 12px; }
        .form-control:focus { background: rgba(0,0,0,0.8); color: #fff; border-color: #00f3ff; box-shadow: 0 0 10px rgba(0,243,255,0.5); }
        .btn-login { background: rgba(0, 243, 255, 0.15); color: #00f3ff; border: 1px solid #00f3ff; width: 100%; padding: 12px; border-radius: 50px; font-weight: bold; letter-spacing: 1px; transition: 0.3s; margin-top: 10px; }
        .btn-login:hover { background: #00f3ff; color: #000; box-shadow: 0 0 20px rgba(0, 243, 255, 0.6); }
        .register-link { text-align: center; display: block; margin-top: 20px; color: #888; text-decoration: none; font-size: 14px; font-family: sans-serif; }
        .register-link:hover { color: #00f3ff; }
        .alert { margin-bottom: 20px; font-family: sans-serif; font-size: 14px; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>SİSTEME GİRİŞ</h2>
        
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('giris-islem') ?>" method="POST">
            <input type="email" name="email" class="form-control" placeholder="E-Posta Adresi" required>
            <input type="password" name="password" class="form-control" placeholder="Şifre" required>
            
            <button type="submit" class="btn-login">GİRİŞ YAP</button>
        </form>
        
        <a href="<?= base_url('kayit') ?>" class="register-link">Hesabın yok mu? Yeni Kayıt Oluştur</a>
    </div>

</body>
</html>