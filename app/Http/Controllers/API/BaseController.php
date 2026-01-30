<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($result, $message, $code = 200, $count = 0)
    {
        $response = [
            'code'    => $code,
            'success' => true,
            'total' => $count,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    public function error($error, $errorMessage = [], $code = 500)
    {
        $response = [
            'code'    => $code,
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessage)) {
            $response['data'] = $errorMessage;
        }

        return response()->json($response, $code);
    }
}
