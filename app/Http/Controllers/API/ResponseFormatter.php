<?php

namespace App\Http\Controllers\API;


class ResponseFormatter{

    protected static $response = [
        'status' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
        ],
        'data' => null
    ];


    public static function success($data = null, $message = null)
    {
        self::$response['status']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['status']['code']);
    }

    public static function error($data = null, $message = null, $code=400)
    {
        self::$response['status']['status'] = 'error';
        self::$response['status']['code'] = $code;
        self::$response['status']['message'] = $message;
        self::$response['data']= $data;
        

        return response()->json(self::$response, self::$response['status']['code']);
    } 
}

// 45069316375
// 537620230841