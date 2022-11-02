<?php


namespace App\Traits;

trait ApiResponse{

    public function response($data=[],$message,$code=200,$errors=[]){

        if($data!=null){
            if(array_key_exists('data',$data)){
                return response()->json([
                    $data,
                    'message'=>$message,
                    'code'=>$code,
                    'errors'=>$errors
                ],200);
            }else{
                return response()->json([
                    'data'=>$data,
                    'message'=>$message,
                    'code'=>$code,
                    'errors'=>$errors
                ],200);
            }
        }else{
            return response()->json([
                'data'=>$data,
                'message'=>$message,
                'code'=>$code,
                'errors'=>$errors
            ],200);
        }
        

    }

}