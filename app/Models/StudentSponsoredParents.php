<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSponsoredParents extends Model
{
    protected $fillable = [
        'parent_name',
        'tel',
        'line_id',
        'google_map_link',
        'address',
        'student_sponsored_id',
    ];
}
