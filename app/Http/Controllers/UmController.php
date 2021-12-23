<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Um;
use App\Models\Test;
use App\Imports\UmImport;
use App\Exports\UmExport;
use Excel;

class UmController extends Controller
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
        if($request==null){//display all
            $tests=Test::paginate(5);
            
        }
        else{//filtering process with
            $keyword=$request->get('keyword');
            //$request is data from the form
            $ums=Um::where('name',
            'LIKE','%'.$keyword.'%')
            ->orwhere('studentno', 'like', '%'.$keyword.'%')
            
            ->orwhere('date', 'like', '%'.$keyword.'%')
            ->orwhere('degree', 'like', '%'.$keyword.'%')
            ->orwhere('university', 'like', '%'.$keyword.'%')
            ->orwhere('year', 'like', '%'.$keyword.'%')
            ->paginate(5);
        }
        //point to interface named index
        
        return view('um.index')
        ->with(compact('ums'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //call the create.blade.php 
        return view('um.create');
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
            'studentno' => ['required',],
            'date' => 'required',
            'faculty' => 'required',
            'degree' => 'required',
            'university' => 'required',
            'year' => 'required'

        ]);
        //execute saving record to database model
        Um::create($request->all());//insert sql

        //redirect
        return redirect()->route('um.create')
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
        $um=Um::find($id);
        return view('um.edit')
                ->with(compact('um'));
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
        $um=Um::find($id);
        $um->update(
            $request->only('name','secondname','studentno','date','level','faculty','degree','university','year')
        );
        return redirect('/um')
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
        $um=Um::find($id);
        $um->delete();
        return redirect('/um')
                ->with('success','Student record has been deleted');

    }

}

