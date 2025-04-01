<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@test.com'], // Condición para verificar si ya existe
            [
                'name' => 'Test User',
                'password' => bcrypt('testtest')
            ]
        );

        $this->call(RolesSeeder::class);
    }
}
