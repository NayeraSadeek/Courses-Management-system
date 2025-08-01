<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
     use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'email',
        'user_id',
    ];
      public function courses()
    {
        return $this->hasMany(Course::class, 'doctor_id', 'id');
    }
}
