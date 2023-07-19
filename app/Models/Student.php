<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relation
    public function class_school()
    {
        return $this->belongsTo(ClassSchool::class, 'class_school_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'student_id', 'nis');
    }
}
