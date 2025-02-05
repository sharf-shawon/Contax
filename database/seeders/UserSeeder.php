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
            'name' => 'Super Admin',
            'email' => 'super.admin@shawon.me',
            'phone' => '01600000000',
            'password' => bcrypt('demo1234'),
        ]);;
        User::create([
            'name' => 'Admin',
            'email' => 'admin@shawon.me',
            'phone' => '01700000000',
            'password' => bcrypt('demo1234'),
        ]);;
        //
    }
}
