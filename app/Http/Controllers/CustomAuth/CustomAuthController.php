<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class CustomAuthController extends Controller
{
   public function index()
   {
       return view('CustomAuth.index');
   }

   public function site()
   {
       return view('site');
   }

    public function admin()
    {
        return view('admin');
    }

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function checkAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }



}
