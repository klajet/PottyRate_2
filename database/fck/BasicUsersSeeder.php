<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
use App\Models\usersRoles;
use Illuminate\Support\Facades\DB;

class BasicUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodanie użytkownika admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach( DB::table('roles')->where('name', 'admin') ->get() );

        // Dodanie użytkownika pomocnik
        User::create([
            'name' => 'mod',
            'email' => 'mod@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach( DB::table('roles')->where('name', 'moderator') ->get() );

        // Dodanie użytkownika normalUser
        User::create([
            'name' => 'normalUser',
            'email' => 'normalUser@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach( DB::table('roles')->where('name', 'normalUser') ->get() );
    }
}
