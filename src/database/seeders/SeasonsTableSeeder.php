<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;
use App\Models\Product;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            ['name' => '春'],
            ['name' => '夏'],
            ['name' => '秋'],
            ['name' => '冬'],
        ];

        foreach ($seasons as $seasonData) {
            Season::create(array_merge($seasonData, ['product_id' => null]));

        $productId = Product::first()->id;

        Season::create([
            'name' => $seasonData['name'],
            'product_id' => $productId,
        ]);
        }
    }
}
