<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fum;



class FumController extends Controller
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
        $fums=Fum::paginate(5);
       
        //point to interface named index
        
        return view('fum.index')
        ->with(compact('fums'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //call the create.blade.php 
        return view('fum.create');
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
        Fum::create($request->all());//insert sql

        //redirect
        return redirect()->route('fum.create')
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
        $fum=Fum::find($id);
        return view('fum.edit')
                ->with(compact('fum'));
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
        $fum=Fum::find($id);
        $fum->update(
            $request->only('name')
        );
        return redirect('/fum')
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
        $fum=Fum::find($id);
        $fum->delete();
        return redirect('/fum')
                ->with('success','Student record has been deleted');

    }

}