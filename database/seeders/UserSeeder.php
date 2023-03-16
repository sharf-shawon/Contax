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
            'name' => 'Sharfuddin Shawon',
            'email' => 'sharfuddin.shawon@gmail.com',
            'phone' => '01612404200',
            'password' => bcrypt('12345678'),
        ]);
        //
    }
}
