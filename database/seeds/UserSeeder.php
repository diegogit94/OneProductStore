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
            'surname' => 'Ospina',
            'document_type' => 'CC',
            'document' => '1037632900',
            'mobile' => '3053220512',
            'address' => 'Diagonal 29 #28 Sur 33',
            'city' => 'Envigado',
            'province' => 'Antioquia',
            'postal_code' => '055420',
            'country' => 'Colombia',
            'email' => 'diego@oneproductstore.com',
            'password' => bcrypt('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
