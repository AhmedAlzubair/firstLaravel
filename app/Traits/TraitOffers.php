<?php

namespace App\Traits;

Trait TraitOffers{
    function saveImage($photo,$extension ,$path){
       // $file_extension=$photo->getClientOriginalExtension();
      // $extension = $photo->extension();
        $file_name=time().'.'.$extension;
        $photo->move($path,$file_name);
        return $file_name;
    }
}


