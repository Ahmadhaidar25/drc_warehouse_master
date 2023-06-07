<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\rak;
use App\Models\customer;
use App\Models\line;
use App\Models\fg_performance;
use App\Models\rm_performance;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function dashboard()
    {
        $vendor = vendor::all()->count();
        $rak = rak::all()->count();
        $customer = customer::all()->count();
        $line = line::all()->count();
        $fg = fg_performance::all()->count();
        $rm = rm_performance::all()->count();
        return view('home',compact('vendor','rak','customer','line','fg','rm'));
    }
}
