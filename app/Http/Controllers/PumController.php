<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pum;
use App\Models\Fum;



class PumController extends Controller
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
        $pums=Pum::paginate(5);
       
        //point to interface named index
        
        return view('pum.index')
        ->with(compact('pums'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $fums=Fum::paginate(5);
        //call the create.blade.php 
        return view('pum.create')
        ->with(compact('fums'));
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
            'faculty' => 'required',
           

        ]);
        //execute saving record to database model
        Pum::create($request->all());//insert sql

        //redirect
        return redirect()->route('pum.create')
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
        $pum=Pum::find($id);
        return view('pum.edit')
                ->with(compact('pum'));
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
        $pum=Pum::find($id);
        $pum->update(
            $request->only('name','faculty')
        );
        return redirect('/pum')
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
        $pum=Pum::find($id);
        $pum->delete();
        return redirect('/pum')
                ->with('success','Student record has been deleted');

    }

}