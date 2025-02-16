<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPerfomance extends Model
{
    protected $fillable = [
        'file_name',
        'annotation',
        'sponsoredStudent_id'
    ];
}
