<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('kayit', 'Auth::register');
$routes->post('kayit-islem', 'Auth::registerSubmit');

$routes->get('giris', 'Auth::login');
$routes->post('giris-islem', 'Auth::loginSubmit');
$routes->get('cikis', 'Auth::logout');

$routes->get('sepet', 'Cart::index');
$routes->get('sepete-ekle/(:num)', 'Cart::add/$1');
$routes->get('sepetten-sil/(:num)', 'Cart::remove/$1');
$routes->get('sepeti-temizle', 'Cart::clear');
$routes->get('sepet-arttir/(:num)', 'Cart::increase/$1');
$routes->get('sepet-azalt/(:num)', 'Cart::decrease/$1');

$routes->get('urun_nlp.html', 'Home::urunNlp');
$routes->get('urun/(:num)', 'Home::urunDetay/$1');
$routes->get('odeme', 'Order::checkout');
$routes->post('siparis-olustur', 'Order::create');
$routes->get('siparislerim', 'Order::myOrders');