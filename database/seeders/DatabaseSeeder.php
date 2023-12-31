<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AttendanceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CenterSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            LocalSeeder::class,
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class,
            EventsSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
