<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentClass;

class StudentGrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_no',
        'class_id',
        'name',
        'english',
        'mathematics',
        'further_math',
        'hausa',
        'basic_science',
        'basic_tech',
        'social_studies',
        'islamic_studies',
        'creative_art',
        'arabic'
    ];

    public function studentID() {
        return $this->belongsTo(User::class, 'id_no', 'id_no');
    }

    public function classId(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
