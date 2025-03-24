<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('financials')->insert([
            [
                'financial_level' =>  'ฐานะยากจน',
                'point' => 100
            
            ],
            [
                'financcial' => 'ฐานะปานกลาง',
                'point' => 70
            ],
            [
                'financial' => 'ฐานะดี',
                'point' => 55
            ]
            ]);
    }
}
