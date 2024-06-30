<?php

namespace App\Http\Controllers;

use App\Models\Offers\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
 //use Illuminate\Support\Facades\Validator;
 //use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\OfferRequesttt;
use App\Traits\TraitOffers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\UploadedFile;

class OffersController extends Controller
{
    //
   // protected $roule;
   use TraitOffers;
    // protected function getRoule(){
    //     $role=[
    //         'name'=>['required','max:100'],
    //         'price'=>['required','double'],
    //         'detail'=>['required','string','max:200']
    //     ];
    //     return $role;
    // }
    protected function create(){
       return view('offers.create');
    }
    protected function store(Request $request){
      //   $roule=$this->getRoule();
     //  $validite=Validator::make($request->all(), $roule);
      // if($validite->failed()){
      //   return $validite->errors();
      // }
          // Retrieve the validated input data...
    //$validated = $request->validated();
      //  // Retrieve the validated input data...
      //  $validated = $request->validated();
 
      //  // Retrieve a portion of the validated input data...
      //  $validated = $request->safe()->only(['name', 'price','detail']);
      //  $validated = $request->safe()->except(['name', 'price','detail']);
     // $file = $request->file('photo');
    //  $extension3 = $file->getClientOriginalExtension();
     
      $extension3 = $request->photo;
      $extension2 = $request->file('photo');
      //$extension2 = ;
      $extension = $request->photo->extension();
      $file_name=$this->saveImage($extension3 ,$extension ,'images/offers/');
      Offer::create([
        'name_ar'=> $request->input('name_ar'),
        'name_en'=> $request->input('name_en'),
        'price'=> $request->input('price'),
        'detail_ar'=> $request->input('detail_ar'),
        'detail_en'=> $request->input('detail_en'),
        'photo'=> $file_name,

      ]);
      // Offer::create([
      //   'name'=> $request->name,
      //   'price'=> $request->price,
      //   'detail'=> $request->detail,

      // ]);
      return redirect()->back()->with(['success'=>'Success To Add']);
      
    }

    protected function getAll(){

    $offers=  Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name','price','detail_'.LaravelLocalization::getCurrentLocale().' as detail')->get();

      return view('offers.all',compact('offers'));
    }
    protected function editOffer($id){
      $offer=Offer::find($id);
      if(!$offer)
      return redirect()->back();
      $offer=Offer::select('id','name_ar','name_en','price','detail_ar','detail_en')->find($id);
      return view('offers.edit',compact('offer'));
    }
    protected function updateOffer(Request $request,$id){
      $offer=Offer::find($id);
      if(!$offer)
      return redirect()->back();
      $offer->update($request->all());
      return redirect()->back()->with(['success'=>'Success To update']);
    }
}
