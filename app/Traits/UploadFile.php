<?php


namespace App\Traits;

trait UploadFile{

    public function UploadImage($file,$destination){
        $destination_path=$destination;
        $filename=date('YmdHi').$file->getClientOriginalName();
        $path =$file->storeAs($destination_path,$filename);
        return $path;
    }

}