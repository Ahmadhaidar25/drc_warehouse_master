<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use Http;

class ControllerVendor extends Controller
{
 public function __construct()
 {
    $this->middleware('auth'); 
}
public function index()
{
    $data = vendor::all();
    return view('master.vendor',compact('data'));
}

public function create(Request $request)
{
    $request->validate([
        'name_vendor'=>'required',
    ]);

    $post = new vendor;
    $post->name_vendor = $request->name_vendor;
    $post->save();
     return redirect('/master/vendor')->with(['success' => 'Data added successfully']);
}


public function update(Request $request,$id)
{
    $request->validate([
        'name_vendor'=>'required',
    ]);

    $post = vendor::find($id);
    $post->name_vendor = $request->name_vendor;
    $post->update();



    return redirect('/master/vendor')->with(['success' => 'Data update successfully']);
}

public function delete($id)
{
   $delete = vendor::find($id);
   $delete->delete();
   return redirect('/master/vendor')->with(['success' => 'data deleted successfully']);
}
}
