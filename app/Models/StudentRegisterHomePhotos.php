<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegisterHomePhotos extends Model
{
    protected $fillable =[
        'file_name',
        'student_register_id'
    ];
}
