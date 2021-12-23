<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request==null){//display all
            $admins=Admin::paginate(5);
        }
        else{//filtering process with
            $keyword=$request->get('keyword');
            //$request is data from the form
            $admins=Admin::where('name',
            'LIKE','%'.$keyword.'%')
            ->paginate(5);
        }
        //point to interface named index
        return view('admin.index')
        ->with(compact('admins'));
    }

    public function adminHome()
    {
        return view('usim.index');
    }
    
}
