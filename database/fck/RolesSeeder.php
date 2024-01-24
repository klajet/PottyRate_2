<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Roles::firstOrCreate(['name' => 'admin']);

        // Sprawdź czy rola "pomocnik" istnieje, jeśli nie, dodaj ją
        $pomocnikRole = Roles::firstOrCreate(['name' => 'moderator']);

        // Sprawdź czy rola "normalUser" istnieje, jeśli nie, dodaj ją
        $normalUserRole = Roles::firstOrCreate(['name' => 'normalUser']);
    }
}
