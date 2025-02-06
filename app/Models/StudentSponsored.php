<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSponsored extends Model
{
    protected $fillable = [
        'student_name',
        'tel',
        'line_id',
        'adress',
        'education_level',
        'note',
        'note',
    ];
}
