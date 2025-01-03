<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            EducationFieldSeeder::class,
            EducationLevelSeeder::class,
            JobSeeder::class,
            SkillSeeder::class,
            MilitaryServiceSeeder::class,
            DrivingLicensesSeeder::class,
            LanguagesSeeder::class,
            MaritalStatusesSeeder::class,
            LocationSeeder::class
        ]);
    }
}
