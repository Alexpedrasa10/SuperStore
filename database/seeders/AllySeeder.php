<?php

namespace Database\Seeders;

use App\Models\Ally;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $al = Ally::create([
            'name' => 'Aliado 1',
            'email' => 'aliado@example.com'
        ]);

        $al->categories()->sync(1);
    }
}
