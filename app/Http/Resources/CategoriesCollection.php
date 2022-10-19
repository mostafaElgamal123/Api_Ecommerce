<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (http_response_code()) {
            $statusCode = http_response_code();
        } else {
            $statusCode = 500;
        }
        switch ($statusCode) {
            case 401:
                $response['error'] = ['401'=>'Unauthorized'];
                break;
            case 403:
                $response['error'] = ['403'=>'Forbidden'];
                break;
            case 404:
                $response['error'] = ['404'=>'Not Found'];
                break;
            case 405:
                $response['error'] = ['405'=>'Method Not Allowed'];
                break;
            case 422:
                $response['error'] = ['422'=>"Unprocessable Entity (validation failed)"];
                break;
            default:
                $response['error'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong' :["500"=>""];
                break;
        }
        if($statusCode==200){
            $response['message'] = 'succes';
        }else{
            $response['message'] = 'fail';
        }
        return [
            "status"=>http_response_code(),
            "data"=>["key"=>$this->collection],
            "error"=>$response['error'],
            "message"=>$response['message']
        ];
    }
}
