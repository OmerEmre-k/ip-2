<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->insert([
            ['skill_name' => 'PHP', 'level' => 'expert', 'created_at' => now(), 'updated_at' => now()],
            ['skill_name' => 'JavaScript', 'level' => 'intermediate', 'created_at' => now(), 'updated_at' => now()],
            ['skill_name' => 'Python', 'level' => 'beginner', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
