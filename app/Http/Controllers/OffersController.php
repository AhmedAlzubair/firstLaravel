<?php

namespace App\Http\Controllers;

use App\Events\OfferEvent;
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
use App\Models\Video;
use App\Models\Scopes\OfferScope;
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
    protected function indexv()
    { 
        return view('ajxF.homeAuth');
    }
    protected function store(Request $request){
      $file_name= $this->imageUpload('images/offers',$request->photo);
      if($file_name!=null){
        Offer::create([
          // 'name_ar'=> $request->input('name_ar'),
          // 'name_en'=> $request->input('name_en'),
          // 'price'=> $request->input('price'),
          // 'detail_ar'=> $request->input('detail_ar'),
          // 'detail_en'=> $request->input('detail_en'),
          // 'photo'=> $file_name,
          'name_ar'=> $request->name_ar,
          'name_en'=> $request->name_en,
          'price'=> $request->price,
          'detail_ar'=> $request->detail_ar,
          'detail_en'=> $request->detail_en,
          'photo'=>   $request->photo,
  
        ]);
        return redirect()->back()->with(['success'=>'Success To Add']);
      }

      // Check if a file was uploaded
    // if ($request->hasFile('photo')) {
    //   // Get the file object
    //   $file = $request->file('photo');
      
    //   // Get the path and extension of the file
    //   $path = $file->path();
    //   $extension = $file->extension();
    //  // $file_name=$this->saveImage( $path,$extension ,'images/offers/');
    //   Offer::create([
    //     'name_ar'=> $request->input('name_ar'),
    //     'name_en'=> $request->input('name_en'),
    //     'price'=> $request->input('price'),
    //     'detail_ar'=> $request->input('detail_ar'),
    //     'detail_en'=> $request->input('detail_en'),
    //     'photo'=> $file_name,

    //   ]);
    //   return redirect()->back()->with(['success'=>'Success To Add']);
    // }
    //   // Handle case where no file was uploaded
    //   return redirect()->back()->with(['photo' => 'Please upload a file.']);
      
    }

    protected function getAll(){
     /** 
      paginate()
      simplePaginate
      cursorPaginate
      */
    $offers=  Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name','price','detail_'.LaravelLocalization::getCurrentLocale().' as detail')->Paginate(PAGINATION_COUNT);

      return view('offers.all',compact('offers'));
    }
    protected function getAllInactive(){
      // Local scope
     // return  $offers=  Offer::inactive()->get();
      // global scope
      //return  $offers=  Offer::get();
      
      return  $offers=  Offer::withoutGlobalScope(OfferScope::class)->get();
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
    protected function getViewer(){
      $video= Video::first();
      event(new OfferEvent($video));
      return view('video',compact('video'));
    }

    protected function createAjxF(){
      return view('ajxF.create');
    }

    protected function storeAjxF(Request $request){
     //$file_name= $this->saveImage($request->photo,'images/offers');
    //  if($request->has('photo')){
      // $file_name=$request->file('photo')->store('images/offers','public');
     
      $offer=  Offer::create([
        'name_ar'=> $request->name_ar,
        'name_en'=> $request->name_en,
        'price'=> $request->price,
        'detail_ar'=> $request->detail_ar,
        'detail_en'=> $request->detail_en,
        'photo'=>   $request->photo,


      ]);
      if($offer)
      return response()->json(['statuse'=>true,'msg'=>'Success To Add']);
      else
      return response()->json(['statuse'=>false,'msg'=>'False To Add']);
   // }
      // if($file_name!=null){
      //   Offer::create([
      //     'name_ar'=> $request->name_ar,
      //     'name_en'=> $request->name_en,
      //     'price'=> $request->price,
      //     'detail_ar'=> $request->inputdetail_ar,
      //     'detail_en'=> $request->detail_en,
      //     'photo'=> $file_name,
  
      //   ]);
      //   return response()->json(['statuse'=>true,'msg'=>'Success To Add']);
      // }

    }
    protected function updateOfferAjxF(Request $request){
      $offer=Offer::find($request->id);
      if(!$offer)
      return response()->json(['statuse'=>false,'msg'=>'False To update']);
      $offer->update($request->all());
      return response()->json(['statuse'=>true,'msg'=>'Success To update']);
    }
    protected function getAllAjxF(){

      $offers=  Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name','price','detail_'.LaravelLocalization::getCurrentLocale().' as detail')->get();
  
        return view('ajxF.all',compact('offers'));
      }
    protected function deleteAjxF(Request $request){
      $offer=Offer::find($request->id);
      if(!$offer)
      return response()->json(['statuse'=>false,'msg'=>'False To Delete']);
     $offer->delete();
     return response()->json(['statuse'=>true,'msg'=>'Success To Delete','id'=>$request->id]);
    }
}
