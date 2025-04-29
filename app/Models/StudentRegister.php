<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function studentRegisterPhoto(){
        return $this->hasOne(StudentRegisterPhotos::class,'student_register_id');
    }

    public function studentParent(){
        return $this->hasOne(StudentParents::class,'student_register_id');
    }

    public function studentParentFileUpload(){
        return $this->hasOne(StudentParentsFileUploads::class,'student_register_id');
    }

    public function CertificationDocument(){
        return $this->hasOne(CertificationDocument::class,'student_register_id');
    }

    public function academicPerformance(){
        return $this->hasOne(AcademicPerfomance::class,'student_register_id');
    }

    public function RegisterPoint(){
        return $this->hasOne(RegisterPoint::class,'student_register_id');
    }

    public function StudentReceivingScholarship(){
        return $this->hasOne(ReceivingScholarship::class,'student_register_id');
    }

    public function TotalStudentReceivingScholarship($student_id){
        return ReceivingScholarship::where('student_register_id',$student_id)->sum('scholarship');
    }
    public function ReceivingScholarship(){
        return $this->hasOne(ReceivingScholarship::class,'student_register_id');
    }

    public function scholarships()
    {
    return $this->hasMany(ReceivingScholarship::class,'student_register_id');
    }
    




}
