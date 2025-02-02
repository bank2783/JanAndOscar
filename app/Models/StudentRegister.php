<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $fillable = [
        'student_name',
        'address',
        'tel',
        'line_id',
        'google_map_link',
        'education_level',
        'status_id',
        'school_id',
        'user_id'
    ];

    public function studentRegisterFileUpload(){
        return $this->hasOne(StudentRegisterFileUploads::class,'student_register_id');
    }

    public function studentParent(){
        return $this->hasOne(StudentParents::class,'student_register_id');
    }

    public function studentParentFileUpload(){
        return $this->hasOne(StudentParentsFileUploads::class,('student_register_id'));
    }
}
