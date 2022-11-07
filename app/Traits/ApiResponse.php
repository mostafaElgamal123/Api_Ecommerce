<?php


namespace App\Traits;

trait ApiResponse{

    public function response($data=[],$message,$code=200,$errors=[]){

        if(!empty($data['data'])||!empty($data)){
            return response()->json([
                'data'=>$data,
                'message'=>$message,
                'code'=>$code,
                'errors'=>$errors
            ],200);
        }else{
            return response()->json([
                'data'=>[],
                'message'=>$message,
                'code'=>$code,
                'errors'=>$errors
            ],200);
        }
    }

    public function ResponseAuth($data=[],$token,$message,$code=200,$errors=[]){
        return response()->json([
            'data'=>$data,
            'token'=>$token,
            'message'=>$message,
            'code'=>$code,
            'errors'=>$errors
        ],200);
    }

}