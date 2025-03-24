<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterPoint extends Model
{
    protected $fillable = [
        'total_point',
        'student_register_id'
    ];
}
