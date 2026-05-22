<?php
namespace App\Models;
namespace App\Controllers;
use App\Models\ProductModel; 

class Home extends BaseController {
    public function index() {
        $model = new ProductModel();
        // Veritabanındaki tüm ürünleri çekiyoruz
        $data['products'] = $model->findAll(); 
        
        // Ürünleri index.php view'ına gönderiyoruz
        return view('index', $data);
    }
    public function urunNlp() {
        return view('urun_nlp');
    }
    public function urunDetay($id) {
        $model = new \App\Models\ProductModel();
        
        // Veritabanından o ID'ye sahip ürünü bul
        $data['product'] = $model->find($id);

        // Eğer birisi URL'ye rastgele bir ID yazarsa ve ürün yoksa anasayfaya at
        if (!$data['product']) {
            return redirect()->to('/');
        }

        // Ürünü bulduysa tek ortak şablonumuz olan urun_detay'a gönder
        return view('urun_detay', $data);
    }
    public function urunler()
{
    $db = \Config\Database::connect();

  $products = $db->table('products')
    ->where('is_active', 1)
    ->where('stock >', 0)
    ->orderBy('id', 'ASC')
    ->get()
    ->getResultArray();

    return view('products', [
        'products' => $products
    ]);
} 
}