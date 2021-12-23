<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pusim;
use App\Models\Fusim;



class PusimController extends Controller
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
        $pusims=Pusim::paginate(100);
       
        //point to interface named index
        
        return view('pusim.index')
        ->with(compact('pusims'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $fusims=Fusim::paginate(100);
        //call the create.blade.php 
        return view('pusim.create')
        ->with(compact('fusims'));
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
        Pusim::create($request->all());//insert sql

        //redirect
        return redirect()->route('pusim.create')
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
        $pusim=Pusim::find($id);
        $fusims=Fusim::paginate(100);
        return view('pusim.edit')
                ->with(compact('pusim','fusims'));
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
        $pusim=Pusim::find($id);
        $pusim->update(
            $request->only('name','faculty')
        );
        return redirect('/pusim')
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
        $pusim=Pusim::find($id);
        $pusim->delete();
        return redirect('/pusim')
                ->with('success','Student record has been deleted');

    }

}