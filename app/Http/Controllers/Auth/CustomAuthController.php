<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    protected function index()
    { 
        return view('customAuth.homeAuth');
    }
    protected function admin()
    { 
        return view('admin.homeAuth');
    }
    protected function adminlogin()
    { 
        return view('admin.login');
    }

    protected function admincheckAge(Request $request)
    { 
    //     $request->validate([
    //         'email'=>'required|string',
    //         'password'=>'required|min:6'
    //     ]
    // );
        $this->validate( $request,[
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        // $adm= Auth::guard('admin')->attempt(
        //     $this->credentials($request),
        //      $request->boolean('remember')
        // );
        //Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
           // return redirect()->intended('admin');
          // return redirect()->intended('/admin');
          // return view('admin.homeAuth');
          return redirect()->route('admin');
         // return response()->redirectToRoute('admin');
          // return response()->json(['statuse'=>true,'msg'=>'Success To update']);
        }
        else{
            return back()->withInput($request->only('email'));
            //return response()->json(['statuse'=>false,'msg'=>'Success To update']);
        }
        //return redirect()->route('admin');
      
       // return response()->json(['statuse'=>true,'msg'=>'Success To update']);

    }
}
