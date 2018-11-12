<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\Handler;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $vreme = Carbon::now();
        Session::put(['vreme'=>$vreme]);
        return view('home')->with('vreme',$vreme);
    }
    }

    




