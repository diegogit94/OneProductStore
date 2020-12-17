<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Diego',
            'price' => '250000',
            'image' => 'https://http2.mlstatic.com/D_NQ_NP_800755-MCO42106648061_062020-O.webp'
        ]);
    }
}
