<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use App\Admins;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function checkLogin(Request $request)
     {
       $admin = DB::table('admins')->find($request->email);
       if($admin)
       {
         if($admin->email == $request->email && $admin->password == $request->password)
         {
           return redirect('home');
         }
         else {
           echo "No Admins With this Information";
         }
       }
     }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
