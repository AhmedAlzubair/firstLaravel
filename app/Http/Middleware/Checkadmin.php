<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|min:6'
        ]);
        if(!Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
           // return redirect()->intended('admin');
          // return redirect()->intended('/admin');
          // return view('admin.homeAuth');
         
           return back()->withInput($request->only('email'));
        }
        return $next($request);
    }
}
