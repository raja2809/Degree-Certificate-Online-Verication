<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usim;
use App\Models\Fusim;
use App\Models\Pusim;
use App\Models\Test;

class User1Controller extends Controller
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
            $usims=Usim::where('name',
            'LIKE','%'.$keyword.'%')
            ->paginate(100);

        }

        

        elseif($request->studentno){
            $studentno=$request->get('studentno');
            //$request is data from the form
            $usims=Usim::where('studentno',
            'LIKE','%'.$studentno.'%')
            ->paginate(100);

            
      
            
        }

        elseif($request->secondname){
            $secondname=$request->get('secondname');
            //$request is data from the form
            $usims=Usim::where('secondname',
            'LIKE','%'.$secondname.'%')
            ->paginate(100);

            
      
            
        }

        elseif($request->faculty){
            $faculty=$request->get('faculty');
            //$request is data from the form
            $usims=Usim::where('faculty',
            'LIKE','%'.$faculty.'%')
            ->paginate(100);
    
            
        }

        elseif($request->level){
            $level=$request->get('level');
            //$request is data from the form
            $usims=Usim::where('level',
            'LIKE','%'.$level.'%')
            ->paginate(100);
    
            
        }

        elseif($request->degree){
            $degree=$request->get('degree');
            //$request is data from the form
            $usims=Usim::where('degree',
            'LIKE','%'.$degree.'%')
            ->paginate(100);
    
            
        }


        elseif($request->year){
            $year=$request->get('year');
            //$request is data from the form
            $usims=Usim::where('year',
            'LIKE','%'.$year.'%')
            ->paginate(100);
    
            
        }
 
            
        
        else{//filtering process with
            $usims=Usim::paginate(100);
            
        }
        //point to interface named index
        $count = Usim::paginate(100)->count();
        $count1 = Fusim::paginate(100)->count();
        $count2 = Pusim::paginate(100)->count();
        $count3 = Usim::where('level','=','undergraduate studies')->count();
        $count4 = Usim::where('level','=','postgraduate studies')->count();
        return view('user1.index1')
        ->with(compact('usims','count','count1','count2','count3','count4'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('user1.search');
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



