<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];

        return view('cart', [
            'cart' => $cart
        ]);
    }

   public function add($id)
{
    $db = \Config\Database::connect();

    $product = $db->table('products')
        ->where('id', $id)
        ->where('is_active', 1)
        ->where('stock >', 0)
        ->get()
        ->getRowArray();

    if (!$product) {
        return redirect()->to(base_url('urunler'));
    }

    $cart = session()->get('cart') ?? [];

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    } else {
        $cart[$id] = [
            'id'    => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'qty'   => 1
        ];
    }

    session()->set('cart', $cart);

    return redirect()->to(base_url('sepet'));
}

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->set('cart', $cart);

        return redirect()->to(base_url('sepet'));
    }

    public function clear()
    {
        session()->remove('cart');

        return redirect()->to(base_url('sepet'));
    }
    public function increase($id)
{
    $cart = session()->get('cart') ?? [];

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    }

    session()->set('cart', $cart);

    return redirect()->to(base_url('sepet'));
}

public function decrease($id)
{
    $cart = session()->get('cart') ?? [];

    if (isset($cart[$id])) {
        if ($cart[$id]['qty'] > 1) {
            $cart[$id]['qty'] -= 1;
        } else {
            unset($cart[$id]);
        }
    }

    session()->set('cart', $cart);

    return redirect()->to(base_url('sepet'));
}
}