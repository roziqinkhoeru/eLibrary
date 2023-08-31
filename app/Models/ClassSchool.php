<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchool extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relation
    public function students()
    {
        return $this->hasMany(Student::class, 'class_school_id', 'id');
    }
}
