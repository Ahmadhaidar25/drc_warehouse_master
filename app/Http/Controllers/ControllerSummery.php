<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rm_performance;

class ControllerSummery extends Controller
{
    public function index()
    {
        $data_kosong = rm_performance::all()->where('status',0)->where('status_moving');
        $data_sort = rm_performance::all()->where('status',3)->where('status_moving');

        $k = rm_performance::all()->where('status',0);
        $o = rm_performance::all()->where('status',1);
        $n = rm_performance::all()->where('status',2);
        $s = rm_performance::all()->where('status',3);
       return view('transaksi.summery',compact('data_kosong','data_sort','k','o','n','s'));
    }
}
