<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fg_performance;
use Google_Client;
use Google_Service_Sheets;
use SheetDB\SheetDB;
use PDF;
use DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ControllerFgPerformance extends Controller
{

  //  public function __construct()
  //  {
  //    $this->middleware('auth'); 
  // }

  public function Qr()
  {
        // $response = Http::get('https://sheetdb.io/api/v1/sk88sewfnlssv');
        // $a = $response->json();
     $data = fg_performance::orderBy('id','desc')->get();
     return view('master.fg_performance', compact('data'));
  }

  public function create(Request $request)
  {

     $request->validate([
       'status'=>'required',
       'cust'=>'required',
       'part_no'=>'required|unique:barang',
       'part_name'=>'required',
       'line_proces'=>'required',
       'box_type'=>'required',
       'qty_kanban'=>'required',
       'min_stock'=>'required',
       'max_stock'=>'required',
       'act_stock'=>'required',
    ]);

     $post = new fg_performance;
     $post->status = $request->status;
     $post->cust = $request->cust;
     $post->part_no = $request->part_no;
     $post->part_name = $request->part_name;
     $post->line_proces = $request->line_proces;
     $post->box_type = $request->box_type;
     $post->qty_kanban = $request->qty_kanban;
     $post->min_stock = $request->min_stock;
     $post->max_stock = $request->max_stock;
     $post->act_stock = $request->act_stock;
     $post->save();

     $response = Http::post('https://sheetdb.io/api/v1/xbgbwqd8h3up4', [
        'status' => $request->status,
        'cust' => $request->cust,
        'part_no' => $request->part_no,
        'part_name' => $request->part_name,
        'line_proces' => $request->line_proces,
        'box_type' => $request->box_type,
        'qty_kanban' => $request->qty_kanban,
        'min_stock' => $request->min_stock,
        'max_stock' => $request->max_stock,
        'act_stock' => $request->act_stock,
     ]);
     //dd($response->all());

     return redirect('/')->with(['success' => 'Data added successfully']);


  }


  public function cetak_pdf()
  {
   $cetak = fg_performance::all();
    $pdf = PDF::loadview('cetak-pdf.fg-performance',['cetak'=>$cetak]);
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
 }

 public function cetak_excel()
 {
    $cetak = fg_performance::all();
    return view('export-excel.fg-performance',compact('cetak'));
 }
}
