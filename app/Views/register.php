<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisteme Katıl - Jarvis AI</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #050505; 
            color: #fff; 
            font-family: 'Orbitron', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            background-image: radial-gradient(circle at center, #111 0%, #000 100%);
        }
        .register-box { 
            background: rgba(255,255,255,0.02); 
            border: 1px solid rgba(0,243,255,0.2); 
            padding: 40px; 
            border-radius: 15px; 
            width: 100%; 
            max-width: 400px; 
            box-shadow: 0 0 20px rgba(0,243,255,0.1); 
            backdrop-filter: blur(10px);
        }
        .register-box h2 { color: #00f3ff; text-align: center; margin-bottom: 30px; font-weight: 700; letter-spacing: 2px; }
        .form-control { background: rgba(0,0,0,0.5); border: 1px solid rgba(0,243,255,0.3); color: #fff; border-radius: 5px; margin-bottom: 20px; padding: 12px; }
        .form-control:focus { background: rgba(0,0,0,0.8); color: #fff; border-color: #00f3ff; box-shadow: 0 0 10px rgba(0,243,255,0.5); }
        .btn-register { background: rgba(0, 243, 255, 0.15); color: #00f3ff; border: 1px solid #00f3ff; width: 100%; padding: 12px; border-radius: 50px; font-weight: bold; letter-spacing: 1px; transition: 0.3s; margin-top: 10px; }
        .btn-register:hover { background: #00f3ff; color: #000; box-shadow: 0 0 20px rgba(0, 243, 255, 0.6); }
        .login-link { text-align: center; display: block; margin-top: 20px; color: #888; text-decoration: none; font-size: 14px; font-family: sans-serif; }
        .login-link:hover { color: #00f3ff; }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>KAYIT OL

        </h2>
        
        <form action="<?= base_url('kayit-islem') ?>" method="POST">
            <input type="text" name="name" class="form-control" placeholder="Ad Soyad" required>
            <input type="email" name="email" class="form-control" placeholder="E-Posta Adresi" required>
            <input type="password" name="password" class="form-control" placeholder="Şifre Belirle" required>
            
            <button type="submit" class="btn-register">KAYIT OL</button>
        </form>
        
        <a href="<?= base_url('giris') ?>" class="login-link">Zaten bir hesabın var mı? Giriş Yap</a>
    </div>

</body>
</html>