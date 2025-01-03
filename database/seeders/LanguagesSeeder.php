<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->insert([
            ['language' => 'İngilizce', 'proficiency_level' => 'İleri', 'created_at' => now(), 'updated_at' => now()],
            ['language' => 'Almanca', 'proficiency_level' => 'Orta', 'created_at' => now(), 'updated_at' => now()],
            ['language' => 'Fransızca', 'proficiency_level' => 'Başlangıç', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}

