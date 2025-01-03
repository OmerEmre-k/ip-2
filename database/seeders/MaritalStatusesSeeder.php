<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusesSeeder extends Seeder
{
    public function run()
    {
        DB::table('marital_statuses')->insert([
            ['status' => 'Bekar', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Evli', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Boşanmış', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
