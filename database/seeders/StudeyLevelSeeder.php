<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudeyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('study_levels')->insert([
            [
                'study_level_name' => 'เรียนดีมาก',
                'point' => 100
            ],
            [
                'study_level_name' => 'เรียนดี',
                'point' => 80
                
            ],
            [
                'study_level_name' => 'เรียนพอใช้',
                'point' => 70
            ]

        ]);
    }
}
