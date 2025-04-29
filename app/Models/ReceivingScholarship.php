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
    // ReceivingScholarship.php
public function student()
{
    return $this->belongsTo(StudentRegister::class, 'student_register_id');
}

public function scholarship()
{
    return $this->belongsTo(ReceivingScholarship::class);
}

    
}
