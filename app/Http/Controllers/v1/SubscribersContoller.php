<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribersContoller extends Controller
{
    use ResponseTrait;

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'website_id' => 'required|exists:App\Models\Website,id',
            'email' => 'required|email',
            'name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), $validator->errors());
        }

        $validated = $validator->validated();

        $data = Subscription::create($validated);
        return $this->successResponse('Record created', $data, 201);
    }
}
