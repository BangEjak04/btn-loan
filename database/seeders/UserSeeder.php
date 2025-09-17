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
     */
    public function run(): void
    {
        $role = \BezhanSalleh\FilamentShield\Support\Utils::createRole();

        User::factory()->create([
            'name' => 'Reza Andyah Wijaya',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ])->assignRole([$role]);
        User::factory()->create([
            'name' => 'Elwin Syahrial',
            'email' => 'elwin@example.com',
            'password' => Hash::make('elwin'),
        ])->assignRole(['admin']);
    }
}
