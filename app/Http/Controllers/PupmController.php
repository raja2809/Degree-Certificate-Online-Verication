<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupm;
use App\Models\Fupm;



class PupmController extends Controller
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
        $pupms=Pupm::paginate(5);
       
        //point to interface named index
        
        return view('pupm.index')
        ->with(compact('pupms'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $fupms=Fupm::paginate(5);
        //call the create.blade.php 
        return view('pupm.create')
        ->with(compact('fupms'));
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
        pupm::create($request->all());//insert sql

        //redirect
        return redirect()->route('pupm.create')
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
        $pupm=Pupm::find($id);
        return view('pupm.edit')
                ->with(compact('pupm'));
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
        $pupm=Pupm::find($id);
        $pupm->update(
            $request->only('name','faculty')
        );
        return redirect('/pupm')
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
        $pupm=Pupm::find($id);
        $pupm->delete();
        return redirect('/pupm')
                ->with('success','Student record has been deleted');

    }

}