<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentClass;
use App\Models\SchoolSubject;

class AssignSubject extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function subject() {
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }
}
