<?php

namespace App\Exports;

use App\Models\Upm;
use Maatwebsite\Excel\Concerns\FromCollection;

class UpmExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Upm::all();
    }
}
