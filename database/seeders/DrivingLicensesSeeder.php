<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrivingLicensesSeeder extends Seeder
{
    public function run()
    {
        DB::table('driving_licenses')->insert([
            ['license_class' => 'A', 'created_at' => now(), 'updated_at' => now()],
            ['license_class' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['license_class' => 'C', 'created_at' => now(), 'updated_at' => now()],
        ]);


    }
}
