<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    public function fee_category(){
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
        
    }
}
