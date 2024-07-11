<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Patient;
use App\Models\Country;

class RelationController extends Controller
{
    //
    protected function getusersphone(){

        $ss=User::with('phone')->find(6);

       // return $ss->phone;
        //return $ss;
        //$ss->makeHidden(['']);
       // $ss->phone->makeVisible(['user_id']);
      // return $ss->whereHas('phone')->get();
    //   return $ss->whereDoesntHave('phone')->get();
       return   $ss->whereHas('phone',function ($vs){
        $vs->where('code','966');
       })->get();
       // return $ss;

    }
    protected function getphoneusers(){

        $ss=Phone::with('user')->find(1);  
        return $ss;
    }
    /** Start  One to Many     */
    protected function getHospitalDoctor(){

       // $ss=Hospital::with('doctors')->find(1);  
       $doctors=Hospital::select('id','name','address')->get();  
        return view('doctors.all',compact('doctors'));
    }
    protected function getDoctorHospital($hospital_id){

       // $ss=Hospital::with('doctors')->find(1);  
        $ss=Hospital::find($hospital_id); 
        $doctors= $ss->doctors;
    //    $doctors=Doctor::with('hospital',function ($fn){
    //     $fn->select('doctors.id','name','title');
    //    })->find($hospital_id);  
       //$doctors=Doctor::select('id','name','title')->find($hospital_id);  
        return view('doctors.alldoctors',compact('doctors'));
    }
    protected function getallDoctors(){
        $doctors=Doctor::select('id','name','title')->get();  
        return view('doctors.alldoctors',compact('doctors'));
    }

    protected function deleteHospital(Request $request){

        // $ss=Hospital::with('doctors')->find(1);  
         $ss=Hospital::find($request->id);
         if(!$ss)
         //return abort('404');
         return response()->json(['statuse'=>false,'msg'=>'False To delete']);
         $ss->doctors()->delete();
         $ss->delete();
         return response()->json(['statuse'=>true,'msg'=>'Success To delete','id'=>$request->id]); 
        // return redirect()->back()->with(['success'=>'Success To delete']);
    }
    protected function getCountryHospital(){
        return  $patient=Country::with('hospital')->find(1);
        //return $patient->doctor;
    }
    /** End One to Many     */
     /** Start  Many to Many     */
     protected function getDoctorServices($doctor_id){
        $doctors=Doctor::find($doctor_id);
        $services= $doctors->services;
       // $doctors=Doctor::with('services')->find($doctor_id);
       $alldoctors=Doctor::select('id','name')->get(); 
       $allservices=Service::select('id','name')->get(); 
        return view('doctors.doctorsservices',compact('services','alldoctors','allservices'));
     }

     protected function saveDoctorServices(Request $request){
        $doctors=Doctor::find($request->doctor_id);
        if(!$doctors)
        // return abort('404');
        return response()->json(['statuse'=>false,'msg'=>'False To save']);
        else
        //$doctors->services()->attach($request->servicesid);
       // $doctors->services()->sync($request->servicesid);
        $doctors->services()->syncWithoutDetaching($request->servicesid);
        // $allservices=Service::select('id','name')->find($request->servicesid); 
        return response()->json(['statuse'=>true,'msg'=>'Success To save','data'=>$request->servicesid]); 
      
       // return  $doctors->services;
        

     }
   

    /** End Many to Many     */
    /**  HasOneThrough      */
    protected function getDoctorPatient(){
        return  $patient=Patient::with('doctor')->find(2);
        //return $patient->doctor;
    }
    protected function getCountryDoctor(){
        return  $patient=Country::with('doctor')->find(1);
        //return $patient->doctor;
    }

    /** End HasOneThrough   */



}
