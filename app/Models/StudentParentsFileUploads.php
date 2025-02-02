<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentParentsFileUploads extends Model
{
    protected $fillable = [
        'copy_of_house_registration',
        'copy_of_id_card',
        'student_register_id'
    ];
}
