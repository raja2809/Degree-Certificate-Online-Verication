<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdminImport;
use App\Exports\AdminExport;

class ImportExportController extends Controller
{
    public function fileImportExport()
    {
        return view('file-import');
     }
    
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileImport(Request $request) 
     {
         Excel::import(new AdminImport, $request->file('file')->store('temp'));
         return back();
     }
 
     /**
     * @return \Illuminate\Support\Collection
     */
     public function fileExport() 
     {
         return Excel::download(new AdminExport, 'admins-collection.xlsx');
     }    
}
