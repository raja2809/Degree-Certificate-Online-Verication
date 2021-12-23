<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsimImport;
use App\Exports\UsimExport;

class ImportExport3Controller extends Controller
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
         Excel::import(new UsimImport, $request->file('file')->store('temp'));
         return back();
     }
 
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileExport() 
     {
         return Excel::download(new UsimExport, 'usims-collection.xlsx');
     }    
}
