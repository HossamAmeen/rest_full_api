<?php 


namespace App\Http\Controllers\api;



trait ApiResponseTrait {

    public $pagenateNumber = 10 ;
    /*
    [
        data => 
        status => true , false 
        error => ''
    ]
    
    
    */
    public function apiResponse($data = null , $error = null , $code = 200)
    {

            $array = [
                'data' => $data , 
                'status' => in_array($code , [200 , 201 , 202]) ? true : false ,
                'error' => $error,
            ];

            return response($array , $code);

    }
    
}