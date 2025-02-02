<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegisterPhotos extends Model
{
    protected $fillable = [
        'file_name',
        'student_register_id'
    ];
}
