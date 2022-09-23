<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        product::create([
            'name' => 'tas punggung',
            'price' => '26000'
        ]);
        product::create([
            'name' => 'tas kaki',
            'price' => '16000'
        ]);
        product::create([
            'name' => 'kaki punggung',
            'price' => '46000'
        ]);
        product::create([
            'name' => 'leher punggung',
            'price' => '36000'
        ]);
    }
}
