<?php

namespace App\Traits;

trait JsonResponse
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code = 200, $statusCode = 1)
    {
        $response = [
            'code' => $code,
            'status_code' => $statusCode,
            'message' => $message,
        ];

        return empty($result) ? $response : $result->additional($response);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $code = 400, $statusCode = 2)
    {
    	$response = [
            'code' => $code,
            'status_code' => $statusCode,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }
}
