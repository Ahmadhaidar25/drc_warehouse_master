<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fg_performance;
use Carbon\Carbon;

class ControllerBarang extends Controller
{
//    public function __construct()
//    {
//     $this->middleware('auth'); 
// }
public function index($id)
{

    $hari_ini = Carbon::now()->locale('id')->isoFormat('dddd');
    $tgl_ini =  Carbon::now()->format('d-m-Y');
    $data = fg_performance::find($id);
    $grafik = fg_performance::all();
    $barang_kosong = fg_performance::where('status',0)->count();
    $data_barang_kosong = fg_performance::all();
    return view('master.barang',compact('data','hari_ini','tgl_ini','grafik','barang_kosong','data_barang_kosong'));
}
}
