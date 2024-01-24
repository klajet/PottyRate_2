<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
use App\Models\usersRoles;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Roles::firstOrCreate(['name' => 'admin']);

        // Sprawdź czy rola "pomocnik" istnieje, jeśli nie, dodaj ją
        // $moderatorRole = Roles::firstOrCreate(['name' => 'moderator']);

        // Sprawdź czy rola "normalUser" istnieje, jeśli nie, dodaj ją
        $normalUserRole = Roles::firstOrCreate(['name' => 'normalUser']);

        // Sprawdź czy rola "normalUser" istnieje, jeśli nie, dodaj ją
        $blockedUserRole = Roles::firstOrCreate(['name' => 'blockedUser']);

        // Dodanie użytkownika admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach($adminRole);

        // Dodanie użytkownika pomocnik
        User::create([
            'name' => 'pomocnik',
            'email' => 'mod@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach($blockedUserRole);

        // Dodanie użytkownika normalUser
        User::create([
            'name' => 'normalUser',
            'email' => 'normalUser@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach($normalUserRole);
    }
}
