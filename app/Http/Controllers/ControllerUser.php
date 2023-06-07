<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    public function user()
    {
       $data = User::all();
       return view('master.user',compact('data'));
   }

   public function create(Request $request)
   {


    $post = new User;
    $post->name = $request->name;
    $post->nik = $request->nik;
    $post->gander = $request->gander;
    $post->password = Hash::make($request->password);
    $post->levels = $request->levels;
    $post->status = $request->input('status') ? 1 : 0;
    $post->save();
    return redirect('/master/user')->with(['success' => 'Data added successfully']);
}


public function update(Request $request, $id)
{

    $request->validate([
        'name'=>'required',
        'nik'=>'required',
        'gander'=>'required',
        'levels'=>'required',
        
    ]);
    $update = User::find($id);
    $update->name = $request->name;
    $update->nik = $request->nik;
    $update->gander = $request->gander;
    $update->levels = $request->levels;
    $update->status = $request->input('status') ? 1 : 0;

    if ($request->input('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $update->save();
    

    return redirect('/master/user')->with(['success' => 'Data update successfully']);


}
}
