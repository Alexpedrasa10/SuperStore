<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Zapatillas',
                'description' => 'All shoes',
                'products' => [1,2]
            ],
            [
                'name' => 'SmartPhones',
                'description' => 'All Smartphones',
                'products' => [3]
            ]
        ];

        foreach ($categories as $c) {

            $products = $c['products'];
            unset($c['products']);

            $c = Category::create($c);
            $c->products()->sync($products);
            dump($c);
        }
    }
}
