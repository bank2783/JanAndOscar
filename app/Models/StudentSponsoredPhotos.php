<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSponsoredPhotos extends Model
{
    protected $fillable = [
        'file_name',
        'studentSponsored_id'
    ];
}
