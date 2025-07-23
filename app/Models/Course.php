<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'credit_hours',
        'department_id', 
        'doctor_id'
    ];
   public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
     public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')
                    ->withTimestamps(); // keep pivot created_at / updated_at
    }
    public function department()
{
    return $this->belongsTo(Department::class);
}


   
}
