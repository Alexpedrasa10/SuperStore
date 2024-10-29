<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   


        $products = [
            [
                'name' => 'Air Max',
                'description' => 'Amazing Shoes',
                'image_url' => 'https://nikearprod.vtexassets.com/arquivos/ids/878729/FD9082_107_A_PREM.jpg?v=638467294655030000',
                'cta_url' => 'https://nike.com.ar',
            ],
            [
                'name' => 'Vans Knu',
                'description' => 'Amazing Street Shoes',
                'image_url' => 'https://www.cristobalcolon.com/fullaccess/item33929foto137370.jpg',
                'cta_url' => 'https://vans.com.ar'
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Incredible Smartphone',
                'image_url' => 'https://ipoint.com.ar/26705-thickbox_default/iphone-15-pro-max-256gb.jpg',
                'cta_url' => 'https://apple.com.ar'
            ],
        ];


        foreach ($products as $product) {            
            Product::create($product);
        }
    }
}
