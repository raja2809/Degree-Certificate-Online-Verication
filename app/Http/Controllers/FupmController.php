<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fupm;



class FupmController extends Controller
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
        $fupms=Fupm::paginate(5);
       
        //point to interface named index
        
        return view('fupm.index')
        ->with(compact('fupms'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //call the create.blade.php 
        return view('fupm.create');
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
           

        ]);
        //execute saving record to database model
        Fupm::create($request->all());//insert sql

        //redirect
        return redirect()->route('fupm.create')
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
        $fupm=Fupm::find($id);
        return view('fupm.edit')
                ->with(compact('fupm'));
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
        $fupm=Fupm::find($id);
        $fupm->update(
            $request->only('name')
        );
        return redirect('/fupm')
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
        $fupm=Fupm::find($id);
        $fupm->delete();
        return redirect('/fupm')
                ->with('success','Student record has been deleted');

    }

}