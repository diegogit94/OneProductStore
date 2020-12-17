<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Diego',
            'email' => 'diego@oneproductstore.com',
            'password' => bcrypt('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
