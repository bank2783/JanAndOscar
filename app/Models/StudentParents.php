<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentParents extends Model
{
    protected $fillable = [
        'parent_name',
        'tel',
        'line_id',
        'address',
        'google_map_link',
        'student_register_id',
        'status'
        
    ];
}
