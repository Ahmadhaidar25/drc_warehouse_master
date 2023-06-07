<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rak;

class ControllerRak extends Controller
{
   public function __construct()
   {
    $this->middleware('auth'); 
}
public function index()
{
    $data = rak::all();
    return view('master.rak',compact('data'));
}

public function create(Request $request)
{
    $request->validate([
        'name_rak'=>'required',
    ]);

    $post = new rak;
    $post->name_rak = $request->name_rak;
    $post->save();



    return redirect('/master/rak')->with(['success' => 'Data added successfully']);
}


public function update(Request $request,$id)
{
    $request->validate([
        'name_rak'=>'required',
    ]);

    $post = rak::find($id);
    $post->name_rak = $request->name_rak;
    $post->update();



    return redirect('/master/rak')->with(['success' => 'Data update successfully']);
}

public function delete($id)
{
   $delete = rak::find($id);
   $delete->delete();
   return redirect('/master/rak')->with(['success' => 'data deleted successfully']);
}
}
