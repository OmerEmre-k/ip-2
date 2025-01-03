<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('education_levels')->insert([
            ['name' => 'Lise', 'education_level_id' => null],
            ['name' => 'Ön Lisans', 'education_level_id' => null],
            ['name' => 'Lisans', 'education_level_id' => null],
            ['name' => 'Yüksek Lisans', 'education_level_id' => null],
            ['name' => 'Doktora', 'education_level_id' => null],
        ]);

    }
}
