<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\StudentGrade;
use Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentGradeImport implements ToModel, WithHeadingRow, SkipsOnError
{
    public function __construct($term){
        $this->term = $term;
    }
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $class_id = Auth::user()->class_id;
        return new StudentGrade([
            'id_no' => $row['id_no'],
            'class_id' => $class_id,
            'name' => $row['name'],
            'english' => $row['english'],
            'mathematics' => $row['mathematics'],
            'further_math' => $row['further_math'],
            'basic_science' => $row['basic_science'],
            'hausa' => $row['hausa'],
            'social_studies' => $row['social_studies'],
            'basic_tech' => $row['basic_tech'],
            'islamic_studies' => $row['islamic_studies'],
            'creative_art' => $row['creative_art'],
            'arabic' => $row['arabic'],
            'term' => $this->term,
           

        ]);
    }

    
}
