<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {
    public function register() {
        // Şimdilik sadece sayfayı göstereceğiz
        return view('register');
    }
    public function registerSubmit() {
        $model = new UserModel();

        // Formdan gelen verileri alıyoruz
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            // Şifreyi güvenlik için şifreliyoruz (Hoca buna bayılır)
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user', // Yeni kayıt olan herkes standart 'user' olur
            'balance'  => 0.00    // Başlangıç cüzdan bakiyesi
        ];

        // Veritabanına kaydet
        $model->insert($data);

        // Kayıt başarılıysa giriş yap sayfasına yönlendir
        return redirect()->to('giris');
    }
    public function login() {
        return view('login');
    }

    public function loginSubmit() {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Veritabanında bu emaili ara
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Şifre eşleşiyor mu kontrol et
            if (password_verify($password, $user['password'])) {
                // Şifre doğruysa "Session" (Oturum) başlat
                $ses_data = [
                    'id'       => $user['id'],
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'role'     => $user['role'],
                    'balance'  => $user['balance'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/'); // Anasayfaya gönder
            } else {
                $session->setFlashdata('msg', 'Şifre hatalı!');
                return redirect()->to('giris');
            }
        } else {
            $session->setFlashdata('msg', 'Böyle bir kullanıcı bulunamadı!');
            return redirect()->to('giris');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy(); // Oturumu kapat
        return redirect()->to('/');
    }
}