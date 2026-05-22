<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function registerSubmit()
    {
        $model = new UserModel();

        $data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => 'user',
            'balance'   => 0.00,
            'address'   => '',
            'is_frozen' => 0
        ];

        $model->insert($data);

        return redirect()->to('giris');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if (!$user) {
            $session->setFlashdata('msg', 'Böyle bir kullanıcı bulunamadı!');
            return redirect()->to('giris');
        }

       if (($user['is_frozen'] ?? 0) == 1) {
    $session->set('reactivate_email', $user['email']);
    return redirect()->to(base_url('hesap-aktif-et'));
}

        if (!password_verify($password, $user['password'])) {
            $session->setFlashdata('msg', 'Şifre hatalı!');
            return redirect()->to('giris');
        }

        $ses_data = [
            'id'         => $user['id'],
            'name'       => $user['name'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'balance'    => $user['balance'],
            'address'    => $user['address'] ?? '',
            'isLoggedIn' => true
        ];

        $session->set($ses_data);

        if ($user['role'] === 'admin') {
            return redirect()->to('admin');
        }

        return redirect()->to('/');
    }

    public function account()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        return view('account');
    }

    public function updateAccount()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $db = \Config\Database::connect();
        $userId = session()->get('id');

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ];

        $db->table('users')
            ->where('id', $userId)
            ->update($data);

        session()->set([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'address' => $data['address']
        ]);

        return redirect()->to(base_url('hesabim'));
    }

    public function updatePassword()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $newPassword = $this->request->getPost('password');

        if (!$newPassword) {
            return redirect()->to(base_url('hesabim'));
        }

        $db = \Config\Database::connect();

        $db->table('users')
            ->where('id', session()->get('id'))
            ->update([
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);

        return redirect()->to(base_url('hesabim'));
    }

    public function deactivateAccount()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $db = \Config\Database::connect();

        $db->table('users')
            ->where('id', session()->get('id'))
            ->update([
                'is_frozen' => 1
            ]);

        session()->destroy();

        return redirect()->to(base_url('giris'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function reactivatePage()
{
    if (!session()->get('reactivate_email')) {
        return redirect()->to(base_url('giris'));
    }

    return view('reactivate_account');
}

public function reactivateAccount()
{
    $email = session()->get('reactivate_email');

    if (!$email) {
        return redirect()->to(base_url('giris'));
    }

    $db = \Config\Database::connect();

    $db->table('users')
        ->where('email', $email)
        ->update([
            'is_frozen' => 0
        ]);

    session()->remove('reactivate_email');
    session()->setFlashdata('msg', 'Hesabınız tekrar aktif edildi. Giriş yapabilirsiniz.');

    return redirect()->to(base_url('giris'));
}
}