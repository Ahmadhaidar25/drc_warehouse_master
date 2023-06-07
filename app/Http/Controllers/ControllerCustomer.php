<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class ControllerCustomer extends Controller
{
   public function __construct()
   {
    $this->middleware('auth'); 
}

public function index()
{
    $data = customer::all();
    return view('master.customer',compact('data'));
}

public function create(Request $request)
{
    $request->validate([
        'name_customer'=>'required',
    ]);

    $post = new customer;
    $post->name_customer = $request->name_customer;
    $post->save();



    return redirect('/master/customer')->with(['success' => 'Data added successfully']);
}


public function update(Request $request,$id)
{
    $request->validate([
        'name_customer'=>'required',
    ]);

    $post = customer::find($id);
    $post->name_customer = $request->name_customer;
    $post->update();



    return redirect('/master/customer')->with(['success' => 'Data update successfully']);
}

public function delete($id)
{
 $delete = customer::find($id);
 $delete->delete();
 return redirect('/master/customer')->with(['success' => 'data deleted successfully']);
}
}
