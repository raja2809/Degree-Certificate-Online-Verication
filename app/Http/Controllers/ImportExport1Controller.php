<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UmImport;
use App\Exports\UmExport;

class ImportExport1Controller extends Controller
{
    // 
    public function fileImportExport1()
    {
        return view('file-import');
     }
    
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileImport(Request $request) 
     {
         Excel::import(new UmImport, $request->file('file')->store('temp'));
         return back();
     }
 
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileExport() 
     {
         return Excel::download(new UmExport, 'ums-collection.xlsx');
     }    
}
