<?php

namespace App\Http\Controllers;

use App\Models\Offers\Offer;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    //
    protected $roule;

    protected function getRoule(){
        $role=[
            'name'=>['required','max:100'],
            'price'=>['required','double'],
            'detail'=>['required','string','max:200']
        ];
        return $role;
    }
    protected function create(){
        Route::view('offers.create');
    }
    protected function store(Request $request){
        $roule=$this->getRoule();
      $validite=Validator::make($request->all(), $roule);
      if($validite->failed()){
        return $validite->errors();
      }
      Offer::create([
        'name'=> $request->name,
        'price'=> $request->price,
        'detail'=> $request->detail,

      ]);
    }
}
