<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        product::create([
            'code' => 'B01',
            'name' => 'Beras Pulen',
            'image' => '1.jpg',
            'price' => 12500,
            'stock' => 10
        ]);
        product::create([
            'code' => 'C01',
            'name' => 'Air Mineral',
            'image' => '2.jpg',
            'price' => 5000,
            'stock' => 30
        ]);
    }
}
