<?php

namespace App\Traits;

use App\Models\otp;

trait ResponseTrait
{

    /**
     * Success Response
     *
     * @param status code, message, data, status, header
     * @return \Illuminate\Http\JsonResponse
     */

    public function successResponse($message, $data=[], $header = 200, $status = true)
    {
        return response()->json(compact('message', 'data'), $header);
    }

    public function dataResponse($data=[], $header = 200)
    {
        return response()->json($data, $header);
    }

    /**
     * Error Response
     *
     * @param status code, message, data, status, header
     * @return \Illuminate\Http\JsonResponse
     */

    public function errorResponse($message, $data=[], $header = 200, $status = false)
    {
        return response()->json(compact('status', 'message', 'data'), $header);
    }

    public function appResponse($status, $statusCode, $message = '', $data = null): AppResponse {
        return new AppResponse($status, $statusCode, $message, $data);
    }

    /**
     * takes app response class and convert it to appropriate http response
     */
    public function appToHttpResponse(AppResponse $response) {
        return ($response->status)? $this->successResponse($response->message, $response->data) : $this->errorResponse($response->message, $response->data);
    }

}

class AppResponse{
    public $statusCode;
    public $status;
    public $message;
    public $data;

    public function __construct($status, $statusCode, $message = '', $data = null){
        $this->status = $status;
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->data = $data;
    }
}

