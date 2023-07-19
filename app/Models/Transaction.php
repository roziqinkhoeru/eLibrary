<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'nis');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
