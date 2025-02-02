<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            [
                'school_name' => 'โรงเรียนวัดห้วยพระจันทร์',
            ],
            [
                'school_name' => 'โรงเรียนวัดทุ่งโพ',
            ],
            [
                'school_name' => 'โรงเรียนชุมชนบ้านหนองงาแซง',
            ],
            [
                'school_name' => 'โรงเรียนบ้านเนินเกล้า',
            ],
            [
                'school_name' => 'โรงเรียนวัดหนองมะกอก'
            ],
            [
                'school_name' => 'โรงเรียนวัดหนองบัว',
            ],
            [
                'school_name' => 'โรงเรียนชุมชนบ้านทุ่งนางงาม'
            ],
            [
                'school_name' => 'โรงเรียนวัดหนองยาง'
            ],
            [
                'school_name' => 'โรงเรียนบ้านท่าชะอม'
            ],
            [
                'school_name' => 'โรงเรียนอนุบาลหนองขาหย่าง'
            ],
            [
                'school_name' => 'โรงเรียนหนองฉางวิทยา'
            ],
            [
                'school_name' => 'โรงเรียนวัดทุ่งหลวง'
            ],
            [
                'โรงเรียนหนองขาหย่างวิทยาคม'
            ]
        ]);
    }
}
