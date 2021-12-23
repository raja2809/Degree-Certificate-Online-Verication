<?php

namespace App\Exports;

use App\Models\Um;
use Maatwebsite\Excel\Concerns\FromCollection;

class UmExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Um::all();
    }
}
