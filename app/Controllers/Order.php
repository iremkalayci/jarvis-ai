<?php

namespace App\Controllers;

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

        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');

        if (empty($address) || empty($phone)) {
            return redirect()->to(base_url('odeme'));
        }

        $userId = session()->get('user_id');

        if (!$userId) {
            $userId = session()->get('id');
        }

        if (!$userId) {
            $userId = 1;
        }

        $totalPrice = 0;

        foreach ($cart as $item) {
            $price = isset($item['price']) ? (float) $item['price'] : 0;
            $qty = isset($item['qty']) ? (int) $item['qty'] : 1;

            $totalPrice += $price * $qty;
        }

        $db = \Config\Database::connect();

        $db->table('orders')->insert([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'address' => $address,
            'phone' => $phone,
            'status' => 'Sipariş Alındı',
            'is_approved' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $orderId = $db->insertID();

        foreach ($cart as $key => $item) {
            $price = isset($item['price']) ? (float) $item['price'] : 0;
            $qty = isset($item['qty']) ? (int) $item['qty'] : 1;
            $subtotal = $price * $qty;

            $db->table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => isset($item['id']) ? $item['id'] : $key,
                'product_title' => isset($item['title']) ? $item['title'] : 'Ürün',
                'quantity' => $qty,
                'price' => $price,
                'subtotal' => $subtotal,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        session()->remove('cart');

        return redirect()->to(base_url('siparislerim'));
    }

    public function myOrders()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            $userId = session()->get('id');
        }

        if (!$userId) {
            $userId = 1;
        }

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