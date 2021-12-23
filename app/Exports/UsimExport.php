<?php

namespace App\Exports;

use App\Models\Usim;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsimExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usim::all();
    }
}
