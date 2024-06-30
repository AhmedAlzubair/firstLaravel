<?php

namespace App\Http\Controllers\Offers;
use App\Http\Controllers\Controller;
use App\Models\Offers\Offer;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    //
    protected $roule;
    public $messages;

    protected function getRoule(){
        $role=[
            // 'name'=>['required','unique','max:100'],
            // 'price'=>['required','double'],
            // 'detail'=>['required','string','max:200']
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|double',
            'detail'=>'required|string|max:200'
        ];
        return $role;
    }
    protected function create(){
      return view('offers.create');
    }
    public function getmessages():array
    {
        return [
            'name.required'=>__('messages.name Importint'),
             'name.unique'=>__('messages.nameUnique'),
            'price.double'=>__('messages.price Number'),
            'price.required'=>__('messages.price Importint'),
            'detail.required'=>__('messages.detail Importint'),

        ];
    }
    protected function store(Request $request){
        $roule=$this->getRoule();
        $messages=$this->getmessages();
      $validite=Validator::make($request->all(), $roule,$messages);
      if($validite->failed()){
        //return redirect()->back()->withErrors($validite)->withInput($request->all());
        return redirect()->back()->with(['Errors'=>'Errors']);
      }
      else{
        Offer::create([
          'name'=> $request->name,
          'price'=> $request->price,
          'detail'=> $request->detail,
  
        ]);
        return redirect()->back()->with(['success'=>'Success To Add']);
      }

    }
}
