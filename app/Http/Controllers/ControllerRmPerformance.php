<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rm_performance;
use App\Models\vendor;
use App\Models\rak;
use App\Models\customer;
use App\Models\line;
use Illuminate\Support\Facades\Http;
use PDF;

class ControllerRmPerformance extends Controller
{
//  public function __construct()
//  {
//   $this->middleware('auth'); 
// }
public function Qr()
{
  $data = rm_performance::all();
  $vendor = vendor::all();
  $rak = rak::all();
  $customer = customer::all();
  $line = line::all();
  return view('master.rm_performance',compact('data','vendor','rak','customer','line'));
}

public function create(Request $request)
{
   
  $request->validate([
    'status'=>'required',
    'part_no_kbn'=>'required',
    'jenis'=>'required',
    'bq'=>'required',
    'spece_size_mateial'=>'required',
    'std_pck_pcs'=>'required',
    'min'=>'required',
    'max'=>'required',
    'act_kbn'=>'required',
    'act_pcs'=>'required',
    'status_moving'=>'required',
  ]);

  $post = new rm_performance;
  $post->status = $request->status;
  $post->customer_id = $request->customer_id;
  $post->model = $request->model;
  $post->part_no_kbn = $request->part_no_kbn;
  $post->jenis = $request->jenis;
  $post->bq = $request->bq;
  $post->spece_size_mateial = $request->spece_size_mateial;
  $post->vendor_id  = $request->vendor_id ;
  $post->line_id = $request->line_id;
  $post->rak_id  = $request->rak_id ;
  $post->std_pck_pcs = $request->std_pck_pcs;
  $post->min = $request->min;
  $post->max = $request->max;
  $post->act_kbn = $request->act_kbn;
  $post->act_pcs = $request->act_pcs;
  $post->status_moving = $request->status_moving;
  $post->save();

  $response = Http::post('https://sheetdb.io/api/v1/xzo0orxndoced', [
    'status' => $request->status,
    'customer_id' => $request->customer_id,
    'model' => $request->model,
    'part_no_kbn' => $request->part_no_kbn,
    'jenis' => $request->jenis,
    'bq' => $request->bq,
    'spece_size_mateial' =>$request->spece_size_mateial,
    'vendor_id'  => $request->vendor_id,
    'line_id' => $request->line_id,
    'rak_id'  => $request->rak_id,
    'std_pck_pcs' => $request->std_pck_pcs,
    'min' => $request->min,
    'max' => $request->max,
    'act_kbn' => $request->act_kbn,
    'act_pcs' => $request->act_pcs,
    'status_moving' => $request->status_moving,
  ]);
     //dd($response->all());

  return redirect('rm_performance')->with(['success' => 'Data added successfully']);
}

public function detail($id)
{
 $data = rm_performance::find($id);
 return view('detail.rm_performance',compact('data'));
}

public function cetak_pdf()
{
  $cetak = rm_performance::all();

  $pdf = PDF::loadview('cetak-pdf.rm_performance',['cetak'=>$cetak]);
  $pdf->setPaper('A4', 'landscape');
  return $pdf->stream();
}

public function cetak_excel()
{
  $cetak = rm_performance::all();
  return view('export-excel.rm-performance',compact('cetak'));
}
}
