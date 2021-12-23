<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usim;
use App\Models\Fusim;
use App\Models\Pusim;
use App\Models\Test;
use App\Imports\UsimImport;
use App\Exports\UsimExport;
use Excel;

class UsimController extends Controller
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
            $tests=Test;
            
        }
        else{//filtering process with
            $keyword=$request->get('keyword');
            //$request is data from the form
            $usims=Usim::where('name',
            'LIKE','%'.$keyword.'%')
            ->orwhere('studentno', 'like', '%'.$keyword.'%')
            
            ->orwhere('date', 'like', '%'.$keyword.'%')
            ->orwhere('degree', 'like', '%'.$keyword.'%')
            ->orwhere('university', 'like', '%'.$keyword.'%')
            ->orwhere('year', 'like', '%'.$keyword.'%')
            ->paginate(100);
        }
        //point to interface named index
        $count = Usim::paginate(100)->count();
        $count1 = Fusim::paginate(100)->count();
        $count2 = Pusim::paginate(100)->count();
        $count3 = Usim::where('level','=','undergraduate studies')->count();
        $count4 = Usim::where('level','=','postgraduate studies')->count();
        $fusims=Fusim::paginate(100);
        $pusims=pusim::paginate(100);
        return view('usim.index')
        ->with(compact('usims','fusims','pusims','count','count1','count2','count3','count4'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fusims=Fusim::paginate(100);
        $pusims=pusim::paginate(100);
        //call the create.blade.php 
        return view('usim.create')
        ->with(compact('fusims','pusims'));
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
        Usim::create($request->all());//insert sql

        //redirect
        return redirect()->route('usim.create')
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
        $usim=Usim::find($id);
        $fusims=Fusim::paginate(100);
        $pusims=Pusim::paginate(100);
        return view('usim.edit')
                ->with(compact('usim','fusims','pusims'));
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
        $usim=Usim::find($id);
        $usim->update(
            $request->only('name','secondname','studentno','date','level','faculty','degree','university','year')
        );
        return redirect('/usim')
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
        $usim=Usim::find($id);
        $usim->delete();
        return redirect('/usim')
                ->with('success','Student record has been deleted');

    }

}



