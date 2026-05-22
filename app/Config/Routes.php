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
$routes->get('hesabim', 'Auth::account');    
$routes->get('hesabim', 'Auth::account');

$routes->get('admin', 'Admin::index');
$routes->get('admin/siparisler', 'Admin::orders');
$routes->get('admin/siparis-onayla/(:num)', 'Admin::approve/$1');
$routes->get('admin/siparis-iptal/(:num)', 'Admin::cancel/$1');
$routes->get('urunler', 'Home::urunler');
$routes->get('siparis-iptal/(:num)', 'Order::cancel/$1');
$routes->get('teslim-aldim/(:num)', 'Order::delivered/$1');
$routes->get('admin/siparis-ileri/(:num)', 'Admin::nextStep/$1');
$routes->get('admin/urunler', 'Admin::products');
$routes->get('admin/urun-ekle', 'Admin::createProduct');
$routes->post('admin/urun-kaydet', 'Admin::storeProduct');
$routes->get('admin/urun-duzenle/(:num)', 'Admin::editProduct/$1');
$routes->post('admin/urun-guncelle/(:num)', 'Admin::updateProduct/$1');
$routes->get('admin/urun-sil/(:num)', 'Admin::deleteProduct/$1');
$routes->get('admin/urun-durum/(:num)', 'Admin::toggleProduct/$1');
// User hesap işlemleri
$routes->get('hesabim', 'Auth::account');
$routes->post('hesabim-guncelle', 'Auth::updateAccount');
$routes->post('sifre-guncelle', 'Auth::updatePassword');
$routes->get('uyelik-pasif', 'Auth::deactivateAccount');

// User sipariş işlemleri
$routes->get('siparis-iptal/(:num)', 'Order::cancel/$1');
$routes->get('teslim-aldim/(:num)', 'Order::delivered/$1');

// Admin kullanıcı yönetimi
$routes->get('admin/kullanicilar', 'Admin::users');
$routes->get('admin/kullanici-dondur/(:num)', 'Admin::freezeUser/$1');
$routes->get('admin/kullanici-aktif/(:num)', 'Admin::activateUser/$1');
$routes->get('admin/kullanici-sil/(:num)', 'Admin::deleteUser/$1');

// Admin sipariş süreci
$routes->get('admin/siparis-ileri/(:num)', 'Admin::nextStep/$1');
$routes->get('hesap-aktif-et', 'Auth::reactivatePage');
$routes->post('hesap-aktif-et', 'Auth::reactivateAccount');