<?php

namespace App\Controllers;

class Admin extends BaseController
{
    private function checkAdmin()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('giris'));
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        return view('admin_dashboard');
    }

    public function orders()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $db = \Config\Database::connect();

        $orders = $db->table('orders')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin_orders', [
            'orders' => $orders
        ]);
    }

    public function approve($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $db = \Config\Database::connect();

        $db->table('orders')
            ->where('id', $id)
            ->update([
                'status' => 'Sipariş onaylandı',
                'is_approved' => 1
            ]);

        return redirect()->to(base_url('admin/siparisler'));
    }

    public function cancel($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $db = \Config\Database::connect();

        $db->table('orders')
            ->where('id', $id)
            ->update([
                'status' => 'Sipariş iptal edildi',
                'is_approved' => 0
            ]);

        return redirect()->to(base_url('admin/siparisler'));
    }
    public function nextStep($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $order = $db->table('orders')
        ->where('id', $id)
        ->get()
        ->getRowArray();

    if (!$order || $order['is_cancelled'] == 1) {
        return redirect()->to(base_url('admin/siparisler'));
    }

    $currentStep = (int)($order['order_step'] ?? 0);
    $nextStep = min($currentStep + 1, 5);

    $statuses = [
        0 => 'Sipariş alındı',
        1 => 'Ürünleriniz tedarik ediliyor',
        2 => 'Ürünleriniz kutulanıyor',
        3 => 'Ürünleriniz kargoya veriliyor',
        4 => 'Ürünleriniz size doğru yola çıktı',
        5 => 'Ürünleriniz size teslim edilmiştir'
    ];

    $db->table('orders')
        ->where('id', $id)
        ->update([
            'order_step' => $nextStep,
            'status' => $statuses[$nextStep],
            'is_approved' => 1
        ]);

    return redirect()->to(base_url('admin/siparisler'));

}
public function products()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $products = $db->table('products')
        ->orderBy('id', 'DESC')
        ->get()
        ->getResultArray();

    return view('admin_products', [
        'products' => $products
    ]);
}

public function createProduct()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    return view('admin_product_form', [
        'product' => null
    ]);
}

public function storeProduct()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $imageName = null;
    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $imageName = $image->getRandomName();
        $image->move(FCPATH . 'uploads/products', $imageName);
    }

    $db->table('products')->insert([
        'title' => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'price' => $this->request->getPost('price'),
        'stock' => $this->request->getPost('stock'),
        'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        'image' => $imageName
    ]);

    return redirect()->to(base_url('admin/urunler'));
}
public function editProduct($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $product = $db->table('products')
        ->where('id', $id)
        ->get()
        ->getRowArray();

    return view('admin_product_form', [
        'product' => $product
    ]);
}

public function updateProduct($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $product = $db->table('products')
        ->where('id', $id)
        ->get()
        ->getRowArray();

    $imageName = $product['image'] ?? null;
    if ($this->request->getPost('delete_image') == 1) {
    if (!empty($imageName)) {
        $oldPath = FCPATH . 'uploads/products/' . $imageName;

        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
    }

    $imageName = null;
}

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
        if (!empty($imageName)) {
            $oldPath = FCPATH . 'uploads/products/' . $imageName;

            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $imageName = $image->getRandomName();
        $image->move(FCPATH . 'uploads/products', $imageName);
    }

    $db->table('products')
        ->where('id', $id)
        ->update([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
            'image' => $imageName
        ]);

    return redirect()->to(base_url('admin/urunler'));
}

public function deleteProduct($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $product = $db->table('products')
        ->where('id', $id)
        ->get()
        ->getRowArray();

    if ($product && !empty($product['image'])) {
        $imagePath = FCPATH . 'uploads/products/' . $product['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $db->table('products')
        ->where('id', $id)
        ->delete();

    return redirect()->to(base_url('admin/urunler'));
}

public function toggleProduct($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $product = $db->table('products')
        ->where('id', $id)
        ->get()
        ->getRowArray();

    if ($product) {
        $newStatus = $product['is_active'] ? 0 : 1;

        $db->table('products')
            ->where('id', $id)
            ->update([
                'is_active' => $newStatus
            ]);
    }

    return redirect()->to(base_url('admin/urunler'));
}
public function users()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $users = $db->table('users')
        ->orderBy('id', 'DESC')
        ->get()
        ->getResultArray();

    return view('admin_users', [
        'users' => $users
    ]);
}

public function freezeUser($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    if ((int)$id === (int)session()->get('id')) {
        return redirect()->to(base_url('admin/kullanicilar'));
    }

    $db = \Config\Database::connect();

    $db->table('users')
        ->where('id', $id)
        ->update([
            'is_frozen' => 1
        ]);

    return redirect()->to(base_url('admin/kullanicilar'));
}

public function activateUser($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $db->table('users')
        ->where('id', $id)
        ->update([
            'is_frozen' => 0
        ]);

    return redirect()->to(base_url('admin/kullanicilar'));
}

public function deleteUser($id)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    if ((int)$id === (int)session()->get('id')) {
        return redirect()->to(base_url('admin/kullanicilar'));
    }

    $db = \Config\Database::connect();

    $db->table('users')
        ->where('id', $id)
        ->delete();

    return redirect()->to(base_url('admin/kullanicilar'));
}
public function createUser()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    return view('admin_user_form');
}

public function storeUser()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $db = \Config\Database::connect();

    $db->table('users')->insert([
        'name'      => $this->request->getPost('name'),
        'email'     => $this->request->getPost('email'),
        'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'      => $this->request->getPost('role'),
        'balance'   => $this->request->getPost('balance') ?? 0,
        'address'   => $this->request->getPost('address'),
        'is_frozen' => $this->request->getPost('is_frozen') ? 1 : 0
    ]);

    return redirect()->to(base_url('admin/kullanicilar'));
}
}