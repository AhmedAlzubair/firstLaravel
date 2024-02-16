<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;


use Laravel\Socialite\Facades\Socialite;


class FacebookSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFB($service)
    {
        return Socialite::driver($service)->redirect();
    
    }
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback($service)
    {
         $user=Socialite::driver($service)->user();
         return redirect('/home');
    }
    public function callbackc()
    {
         $user=Socialite::with('facebook')->user();
         return $user;
    }
}