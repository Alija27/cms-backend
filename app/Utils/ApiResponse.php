<?php

namespace App\Utils;

class ApiResponse
{
    public static function  success($data, $message = null)
    {
        $response =  [
            'success' => true,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        if ($message) {
            $response['message'] = $message;
        }

        return $response;
    }
}
