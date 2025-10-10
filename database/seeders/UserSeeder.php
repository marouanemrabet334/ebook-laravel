<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed
     */
    public function run(): void
    {
        User::insert([
          [
            'name' => 'Admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',

          ],
          [
            'name' => 'hamza',
            'email' => 'lamrabetmarouane2001@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'user',

          ],
        ]);
    }
}
