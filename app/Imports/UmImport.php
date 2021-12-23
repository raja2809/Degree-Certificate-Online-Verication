<?php

namespace App\Imports;

use App\Models\Um;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UmImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Um([
            //
            'name'     => $row[0],
            'secondname'    => $row[1],
            'studentno'    => $row[2],
            'date'    => $row[3],
            'faculty'    => $row[4],
            'degree'    => $row[5],
            'level'    => $row[6],
            'university'    => $row[7],
            'year'    => $row[8],    
        ]);
    }
}
