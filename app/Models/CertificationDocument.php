<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificationDocument extends Model
{
    protected $fillable = [
        'data_guarantee_document',
        'financial_guarantee_document',
        'student_register_id'
    ];

    
}
