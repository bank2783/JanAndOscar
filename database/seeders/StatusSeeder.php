<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert(
    [
                [
                    'status_name' => 'Active'
                ],
                [
                    'status_name' => 'No_Active'
                ],
                [
                    'is_student_register'
                ],
                [
                    'status_name' => 'is_student_sponsored'
                ]   
            ],
            );
    }
}
