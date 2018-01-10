<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function show()
    {
      $users = User::get();
      return view('afterlog.adminhome', compact('users'));
    }
    public function add(Request $request)
    {
      $data = array("name"=>$request->name, "email"=>$request->email, "password"=>$request->password);
      $user = new User();
      app('App\Http\Controllers\Auth\RegisterController')->validator($data);
      app('App\Http\Controllers\Auth\RegisterController')->create($data);
      //$user->name = $request->name;
      //$user->email = $request->email;
      //$user->password = bcrypt($request->password);
      //$user->save();
      return back();
    }
    public function delete(User $user)
    {
      $user->delete();
      return back();
    }
    public function update(Request $request)
    {
      $user = User::find($request->id);
      if($user)
      {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
      }
      return back();
    }
    public function search(Request $request)
    {
      $user = DB::table('users')->where('id', $request->id)->first();
      if($user)
      {
        return view("afterlog.adminhome", compact('user'));
      }
      return back();
    }
}
