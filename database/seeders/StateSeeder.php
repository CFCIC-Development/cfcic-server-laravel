<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        State::truncate();

        DB::statement("INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
        (1, 1, 'Abia'),
        (2, 1, 'Adamawa'),
        (3, 1, 'Akwa Ibom'),
        (4, 1, 'Anambra'),
        (5, 1, 'Bauchi'),
        (6, 1, 'Bayelsa'),
        (7, 1, 'Benue'),
        (8, 1, 'Borno'),
        (9, 1, 'Cross River'),
        (10, 1, 'Delta'),
        (11, 1, 'Ebonyi'),
        (12, 1, 'Edo'),
        (13, 1, 'Ekiti'),
        (14, 1, 'Enugu'),
        (15, 1, 'FCT'),
        (16, 1, 'Gombe'),
        (17, 1, 'Imo'),
        (18, 1, 'Jigawa'),
        (19, 1, 'Kaduna'),
        (20, 1, 'Kano'),
        (21, 1, 'Katsina'),
        (22, 1, 'Kebbi'),
        (23, 1, 'Kogi'),
        (24, 1, 'Kwara'),
        (25, 1, 'Lagos'),
        (26, 1, 'Nasarawa'),
        (27, 1, 'Niger'),
        (28, 1, 'Ogun'),
        (29, 1, 'Ondo'),
        (30, 1, 'Osun'),
        (31, 1, 'Oyo'),
        (32, 1, 'Plateau'),
        (33, 1, 'Rivers'),
        (34, 1, 'Sokoto'),
        (35, 1, 'Taraba'),
        (36, 1, 'Yobe'),
        (37, 1, 'Zamfara');");

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
