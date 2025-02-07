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

    public function StudentSponsoredParent(){
        return $this->HasOne(StudentSponsoredParents::class,'student_sponsored_id');
    }

    public function StudentSponsoredPhoto(){
        return $this->HasOne(StudentSponsoredPhotos::class,'studentSponsored_id');
    }
}
