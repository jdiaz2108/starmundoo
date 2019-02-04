<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       // dd(Auth::user()->nivel);
      return view('admin.index');
    }
}
