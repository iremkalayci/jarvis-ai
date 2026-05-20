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
        /*
         * Şimdilik ürünleri burada sabit tuttuk.
         * Çünkü sepet çalışsın, proje patlamasın.
         * İstersen sonra bunu ProductModel + database'e bağlarız.
         */
        $products = [
            1 => [
                'id'    => 1,
                'title' => 'Jarvis NLP Pro',
                'price' => 5000
            ],
            2 => [
                'id'    => 2,
                'title' => 'Vision X',
                'price' => 7500
            ],
            3 => [
                'id'    => 3,
                'title' => 'DataCore',
                'price' => 12000
            ],
        ];

        if (!isset($products[$id])) {
            return redirect()->to(base_url('/'));
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id'    => $products[$id]['id'],
                'title' => $products[$id]['title'],
                'price' => $products[$id]['price'],
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