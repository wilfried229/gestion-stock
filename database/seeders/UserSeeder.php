<?php

namespace Database\Seeders;

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
        //

        DB::table('users')->insert([
            'email' => env('ADMIN_EMAIL', 'contact@stock.com'),
            'name' => env('ADMIN_USERNAME', 'Stock'),
            'password' => env('ADMIN_PASSWORD_HASHED', '$2y$10$VXwMW4hpeKtdlCNDhANMtuHKaf59Td1ipST6GPKIBP5WqnCmLdUyC'),
            'role' => 'ADMIN'
        ]);
    }
}
