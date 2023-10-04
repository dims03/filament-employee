<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     *  @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);
        $this->call([
            // CitySeeder::class,
            CountrySeeder::class,
            // StateSeeder::class,
        ]);
    }
}
