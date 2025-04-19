<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivingScholarship extends Model
{
    protected $fillable = [
        'scholarship',
        'annotation',
        'student_register_id'
    ];
}
