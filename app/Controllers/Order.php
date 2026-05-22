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
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to(base_url('sepet'));
        }

        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');

        if (empty($address) || empty($phone)) {
            return redirect()->to(base_url('odeme'));
        }

        $userId = session()->get('id');

        $totalPrice = 0;

        foreach ($cart as $item) {
            $price = isset($item['price']) ? (float) $item['price'] : 0;
            $qty = isset($item['qty']) ? (int) $item['qty'] : 1;

            $totalPrice += $price * $qty;
        }

        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', $userId)
            ->get()
            ->getRowArray();

        $balance = isset($user['balance']) ? (float) $user['balance'] : 0;

        $usedBalance = 0;
        $cardPayment = $totalPrice;

        if ($balance > 0) {
            if ($balance >= $totalPrice) {
                $usedBalance = $totalPrice;
                $cardPayment = 0;
            } else {
                $usedBalance = $balance;
                $cardPayment = $totalPrice - $balance;
            }

            $newBalance = $balance - $usedBalance;

            $db->table('users')
                ->where('id', $userId)
                ->update([
                    'balance' => $newBalance
                ]);

            session()->set('balance', $newBalance);
        }

        $db->table('orders')->insert([
            'user_id'       => $userId,
            'total_price'   => $totalPrice,
            'address'       => $address,
            'phone'         => $phone,
            'status'        => 'Sipariş Alındı',
            'is_approved'   => 0,
            'order_step'    => 0,
            'is_cancelled'  => 0,
            'is_delivered'  => 0,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        $orderId = $db->insertID();

        foreach ($cart as $key => $item) {
            $price = isset($item['price']) ? (float) $item['price'] : 0;
            $qty = isset($item['qty']) ? (int) $item['qty'] : 1;
            $subtotal = $price * $qty;

            $db->table('order_items')->insert([
                'order_id'      => $orderId,
                'product_id'    => isset($item['id']) ? $item['id'] : $key,
                'product_title' => isset($item['title']) ? $item['title'] : 'Ürün',
                'quantity'      => $qty,
                'price'         => $price,
                'subtotal'      => $subtotal,
                'created_at'    => date('Y-m-d H:i:s')
            ]);
        }

        session()->remove('cart');

        return redirect()->to(base_url('siparislerim'));
    }

    public function myOrders()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $userId = session()->get('id');

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

    public function cancel($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $db = \Config\Database::connect();
        $userId = session()->get('id');

        $order = $db->table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if (!$order) {
            return redirect()->to(base_url('siparislerim'));
        }

        if ((int)$order['is_approved'] === 1 || (int)$order['is_cancelled'] === 1) {
            return redirect()->to(base_url('siparislerim'));
        }

        $refundAmount = (float)$order['total_price'];

        $db->table('orders')
            ->where('id', $id)
            ->update([
                'status'       => 'Sipariş iptal edildi',
                'is_cancelled' => 1
            ]);

        $db->table('users')
            ->where('id', $userId)
            ->set('balance', 'balance + ' . $refundAmount, false)
            ->update();

        $newBalance = (float)(session()->get('balance') ?? 0) + $refundAmount;
        session()->set('balance', $newBalance);

        return redirect()->to(base_url('siparislerim'));
    }

    public function delivered($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('giris'));
        }

        $db = \Config\Database::connect();
        $userId = session()->get('id');

        $order = $db->table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if (!$order) {
            return redirect()->to(base_url('siparislerim'));
        }

        if ((int)$order['order_step'] < 5 || (int)$order['is_cancelled'] === 1) {
            return redirect()->to(base_url('siparislerim'));
        }

        $db->table('orders')
            ->where('id', $id)
            ->update([
                'status'       => 'Sipariş teslim alındı',
                'is_delivered' => 1
            ]);

        return redirect()->to(base_url('siparislerim'));
    }
}