<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upm;
use App\Models\Test;


class User3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        if($request->keyword){//display all
            $keyword=$request->get('keyword');
            //$request is data from the form
            $upms=Upm::where('name',
            'LIKE','%'.$keyword.'%')
            ->paginate(5);

        }

        

        elseif($request->studentno){
            $studentno=$request->get('studentno');
            //$request is data from the form
            $upms=Upm::where('studentno',
            'LIKE','%'.$studentno.'%')
            ->paginate(5);

            
      
            
        }

        elseif($request->secondname){
            $secondname=$request->get('secondname');
            //$request is data from the form
            $upms=Upm::where('secondname',
            'LIKE','%'.$secondname.'%')
            ->paginate(5);

            
      
            
        }

        elseif($request->faculty){
            $faculty=$request->get('faculty');
            //$request is data from the form
            $upms=Upm::where('faculty',
            'LIKE','%'.$faculty.'%')
            ->paginate(5);
    
            
        }

        elseif($request->level){
            $level=$request->get('level');
            //$request is data from the form
            $upms=Upm::where('level',
            'LIKE','%'.$level.'%')
            ->paginate(5);
    
            
        }

        elseif($request->degree){
            $degree=$request->get('degree');
            //$request is data from the form
            $upms=Upm::where('degree',
            'LIKE','%'.$degree.'%')
            ->paginate(5);
    
            
        }



        elseif($request->year){
            $year=$request->get('year');
            //$request is data from the form
            $upms=Upm::where('year',
            'LIKE','%'.$year.'%')
            ->paginate(5);
    
            
        }
 
            
        
        else{//filtering process with
            $upms=Upm::paginate(5);
            
        }
        //point to interface named index
        
        return view('user3.index')
        ->with(compact('upms'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('user3.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        //
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
    }
}


