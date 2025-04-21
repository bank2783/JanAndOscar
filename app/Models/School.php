<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'school_name'
    ];

    public function scholarships()
{
    return $this->hasMany(ReceivingScholarship::class);
}

}
