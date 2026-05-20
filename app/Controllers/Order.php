<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Order extends BaseController
{
    public function checkout()
    {
        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('sepet'));
        }

        return view('checkout', [
            'cart' => $cart
        ]);
    }

    public function create()
    {
        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('sepet'));
        }

        $userId = session()->get('user_id') ?? session()->get('id') ?? 1;

        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');

        $total = 0;

        foreach ($cart as $item) {
            $qty = $item['qty'] ?? 1;
            $price = $item['price'] ?? 0;
            $total += $qty * $price;
        }

        $db = \Config\Database::connect();

        $db->table('orders')->insert([
            'user_id' => $userId,
            'total_price' => $total,
            'address' => $address,
            'phone' => $phone,
            'status' => 'Admin onayı bekleniyor',
            'is_approved' => 0
        ]);

        $orderId = $db->insertID();

        foreach ($cart as $key => $item) {
            $qty = $item['qty'] ?? 1;
            $price = $item['price'] ?? 0;
            $subtotal = $qty * $price;

            $db->table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $item['id'] ?? $key,
                'product_title' => $item['title'] ?? 'Ürün',
                'quantity' => $qty,
                'price' => $price,
                'subtotal' => $subtotal
            ]);
        }

        session()->remove('cart');

        return redirect()->to(base_url('siparislerim'));
    }

    public function myOrders()
    {
        $userId = session()->get('user_id') ?? session()->get('id') ?? 1;

        $db = \Config\Database::connect();

        $orders = $db->table('orders')
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('my_orders', [
            'orders' => $orders
        ]);
    }
}