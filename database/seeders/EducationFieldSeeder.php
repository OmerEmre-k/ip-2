<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationFieldSeeder extends Seeder
{
    public function run()
    {
        DB::table('education_fields')->insert([
            ['name' => 'Bilgisayar Mühendisliği', 'education_field_id' => null],
            ['name' => 'Elektrik Mühendisliği', 'education_field_id' => null],
            ['name' => 'Makine Mühendisliği', 'education_field_id' => null],
            ['name' => 'Matematik', 'education_field_id' => null],
            ['name' => 'Fizik', 'education_field_id' => null],
        ]);

    }
}
