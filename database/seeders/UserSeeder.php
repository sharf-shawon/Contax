<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Demo Account',
            'email' => 'demo@shawon.me',
            'phone' => '01700000000',
            'password' => bcrypt('12345678'),
        ]);;
        //
    }
}
