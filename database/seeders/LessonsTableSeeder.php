<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Adjust the loop based on how many lessons you want to generate
        for ($i = 0; $i < 50000; $i++) {
            DB::table('lessons')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph, // Adjust the length as needed
                'weekday' => $faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
                'start_time' => $faker->time('H:i'),
                'end_time' => $faker->time('H:i'),
                'schclass' => $faker->randomElement(['1', '2', '3', '4']),
                'subject' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
                'teacher' => $faker->name,
                'teacher_name' => $faker->name,
                'subject_name' => $faker->randomElement(['English', 'Math', 'Chemistry', 'CRE', 'Physics', 'Biology', 'History', 'Agriculture']),
                'class_name' => $faker->randomElement(['Senior 1', 'Senior 2', 'Senior 3', 'Senior 4']),
                'room' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '8']),
                'school_year' => $faker->randomElement(['2023/2024', '2024/2025', '2025/2026']),
                'term' => $faker->randomElement(['1', '2', '3']),
                'class_size' => $faker->numberBetween(20, 40),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
