<?php

namespace App\Traits;
define("MB", 1048576);
Trait TraitOffers{
    function saveImage($photo, $path){
       // $file_extension=$photo->getClientOriginalExtension();
       $extension = $photo->extension();
        $file_name=time().'.'.$extension;
      // $fl=file($photo);
       // $file_name2=time().$photo;
       // $fl->move_uploaded_file($file_name2,$path);
       $photo->move($path,$file_name);
        return $file_name;
    }
    function imageUpload($dir,$imageRequest)
{
  global $msgError;
if(isset($_FILES[$imageRequest])){
    $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
    $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
    $imagesize  = $_FILES[$imageRequest]['size'];
    $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
    $strToArray = explode(".", $imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);
  
    if (!empty($imagename) && !in_array($ext, $allowExt)) {
      $msgError = "EXT";
    }
    if ($imagesize > 2 * MB) {
      $msgError = "size";
    }
    if (empty($msgError)) {
      move_uploaded_file($imagetmp,  $dir."/". $imagename);
      return $imagename;
    } else {
      return "fail upload";
    }
}
else{
    return "empty";
}
}
}


