<?php

namespace App\Imports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdminImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Admin([
            'name'     => $row[0],
            'secondname'    => $row[1],
            'studentno'    => $row[2],
            'certino'    => $row[3],
            'date'    => $row[4],
            'faculty'    => $row[5],
            'degree'    => $row[6],
            'university'    => $row[7],
            'year'    => $row[8],
            
        ]);
    }
}
