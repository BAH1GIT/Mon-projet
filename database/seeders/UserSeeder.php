<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'ba',
            'email' => 'ba@gmail.com',
            'password' => Hash::make('1234aqws'),
            'role' => 'admin',

        ]);
        User::factory(15)->create([
            'role' => 'client',
            'password' => 'client',
        ]);
        User::factory(10)->create([
            'role' => 'executant',
            'password' => 'executant',
        ]);
    }
}
