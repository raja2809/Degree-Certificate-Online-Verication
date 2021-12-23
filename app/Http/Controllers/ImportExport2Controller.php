<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UpmImport;
use App\Exports\UpmExport;

class ImportExport2Controller extends Controller
{
    //
    public function fileImportExport2()
    {
        return view('file-import');
     }
    
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileImport(Request $request) 
     {
         Excel::import(new UpmImport, $request->file('file')->store('temp'));
         return back();
     }
 
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileExport() 
     {
         return Excel::download(new UpmExport, 'upms-collection.xlsx');
     }    
}
