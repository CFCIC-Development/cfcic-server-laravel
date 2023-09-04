<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Center::truncate();

        Center::create([
            'name' => 'CFC Abuja',
            'address' => '2nd Floor, Silverbird Event Center, CBD, Abuja',
        ]);

        Center::create([
            'name' => 'CFC Gboko',
            'address' => 'Behind Gboko Hills, GRA, Gboko, Benue State',
        ]);

        Center::create([
            'name' => 'CFC Makurdi',
            'address' => 'Behind Gboko Hills, GRA, Gboko, Benue State',
        ]);

        Center::create([
            'name' => 'CFC Kaduna',
            'address' => 'Behind Gboko Hills, GRA, Gboko, Benue State',
        ]);

        Center::create([
            'name' => 'CFC Sagamu',
            'address' => 'Behind Gboko Hills, GRA, Gboko, Benue State',
        ]);

    }
}
