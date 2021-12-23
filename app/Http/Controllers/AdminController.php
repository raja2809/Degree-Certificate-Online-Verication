<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Test;
use App\Imports\AdminImport;
use App\Exports\AdminExport;
use Excel;
use DataTables;
use App\DataTables\AdminDataTable;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        //unlock or lock
        $this->middleware('auth');
    }//end construct

    public function index(Request $request)
    {
        
        //
        if($request->keyword){//display all
            $keyword=$request->get('keyword');
            //$request is data from the form
            $admins=Admin::where('name',
            'LIKE','%'.$keyword.'%')
            ->paginate(5);

        }

        

        if($request->studentno){
            $studentno=$request->get('studentno');
            //$request is data from the form
            $admins=Admin::where('studentno',
            'LIKE','%'.$studentno.'%')
            ->paginate(5);

            
      
            
        }

        elseif($request->secondname){
            $secondname=$request->get('secondname');
            //$request is data from the form
            $admins=Admin::where('secondname',
            'LIKE','%'.$secondname.'%')
            ->paginate(5);

            
      
            
        }

        elseif($request->faculty){
            $faculty=$request->get('faculty');
            //$request is data from the form
            $admins=Admin::where('faculty',
            'LIKE','%'.$faculty.'%')
            ->paginate(5);
    
            
        }

        elseif($request->level){
            $level=$request->get('level');
            //$request is data from the form
            $admins=Admin::where('level',
            'LIKE','%'.$level.'%')
            ->paginate(5);
    
            
        }

        elseif($request->degree){
            $degree=$request->get('degree');
            //$request is data from the form
            $admins=Admin::where('degree',
            'LIKE','%'.$degree.'%')
            ->paginate(5);
    
            
        }


        elseif($request->year){
            $year=$request->get('year');
            //$request is data from the form
            $admins=Admin::where('year',
            'LIKE','%'.$year.'%')
            ->paginate(5);
    
            
        }
 
            
        
        else{//filtering process with
            $admins=Admin::paginate(5);
            
        }
        //point to interface named index
        
        return view('admin.index')
        ->with(compact('admins'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //call the create.blade.php 
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store data to databasse
        //data validation/all field not nullable
        $request->validate([
            'name' => 'required',
            'secondname' => 'required',
            'studentno' => 'required',
            'date' => 'required',
            'faculty' => 'required',
            'degree' => 'required',
            'university' => 'required',
            'year' => 'required'

        ]);
        //execute saving record to database model
        Admin::create($request->all());//insert sql

        //redirect
        return redirect()->route('admin.create')
        ->with('success', 'The new record created successfully.');

    }//end store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin=Admin::find($id);
        return view('admin.edit')
                ->with(compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //inside update function
        $admin=Admin::find($id);
        $admin->update(
            $request->only('name','secondname','studentno','date','faculty','degree','university','year')
        );
        return redirect('/admin')
                ->with('success','Student record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $admin=Admin::find($id);
        $admin->delete();
        return redirect('/admin')
                ->with('success','Student record has been deleted');

    }

}