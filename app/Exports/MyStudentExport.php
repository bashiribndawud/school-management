<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MyStudentExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $class_id = Auth::user()->class_id;
        return User::where('class_id', $class_id)->where('usertype', 'student')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'EMAIL',
            'MOBILE',
            'ADDRESS',
            'GENDER',
            'FATHER NAME',
            'MOTHER NAME',
            'RELIGION',
        ];
    }

    public function map($user): array 
        {
            return [
                $user->id,
                $user->name,
                $user->email,
                $user->mobile,
                $user->address,
                $user->gender,
                $user->fname,
                $user->mname,
                $user->religion,
            ];
        }
}
