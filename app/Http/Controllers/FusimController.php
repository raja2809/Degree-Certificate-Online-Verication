<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fusim;



class FusimController extends Controller
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
        $fusims=Fusim::paginate(5);
       
        //point to interface named index
        
        return view('fusim.index')
        ->with(compact('fusims'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //call the create.blade.php 
        return view('fusim.create');
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
        Fusim::create($request->all());//insert sql

        //redirect
        return redirect()->route('fusim.create')
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
        $fusim=Fusim::find($id);
        return view('fusim.edit')
                ->with(compact('fusim'));
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
        $fusim=Fusim::find($id);
        $fusim->update(
            $request->only('name')
        );
        return redirect('/fusim')
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
        $fusim=Fusim::find($id);
        $fusim->delete();
        return redirect('/fusim')
                ->with('success','Student record has been deleted');

    }

}