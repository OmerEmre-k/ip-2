<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilitaryServiceSeeder extends Seeder
{
    public function run()
    {

        DB::table('military_services')->insert([
            ['military_status' => 'Yaptım', 'created_at' => now(), 'updated_at' => now()],
            ['military_status' => 'Muafım', 'created_at' => now(), 'updated_at' => now()],
            ['military_status' => 'Tecilli', 'created_at' => now(), 'updated_at' => now()],
            ['military_status' => 'Yapmadım', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
