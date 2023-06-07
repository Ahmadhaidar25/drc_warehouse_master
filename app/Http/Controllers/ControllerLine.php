<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\line;
use Illuminate\Support\Facades\Http;

class ControllerLine extends Controller
{
 public function __construct()
 {
    $this->middleware('auth'); 
}
public function index()
{
    $data = line::all();
    return view('master.line',compact('data'));
}

public function create(Request $request)
{
    $request->validate([
        'name_line'=>'required',
    ]);

    $post = new line;
    $post->name_line = $request->name_line;
    $post->save();

    



    return redirect('/master/line')->with(['success' => 'Data added successfully']);
}


public function update(Request $request,$id)
{
    $request->validate([
        'name_line'=>'required',
    ]);

    $post = line::find($id);
    $post->name_line = $request->name_line;
    $post->update();



    return redirect('/master/line')->with(['success' => 'Data update successfully']);
}

public function delete($id)
{
 $delete = line::find($id);
 $delete->delete();
 return redirect('/master/line')->with(['success' => 'data deleted successfully']);
}
}
