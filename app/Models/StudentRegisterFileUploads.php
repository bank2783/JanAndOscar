<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegisterFileUploads extends Model
{
    protected $fillable = [
        'essay',
        'copy_of_birth_cercificate',
        'copy_of_id_card',
        'copy_of_house_registration',
        'student_register_id',
    ];


    
}
