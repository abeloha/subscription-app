<?php

namespace App\Http\Controllers\v1;

use App\Events\Published;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Website;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteContoller extends Controller
{
    use ResponseTrait;

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), $validator->errors());
        }

        $validated = $validator->validated();

        $data = Website::create($validated);
        return $this->successResponse('Record created', $data, 201);
    }


    public function publish(Request $request){

        $validator = Validator::make($request->all(), [
            'website_id' => 'required|exists:App\Models\Website,id',
            'title' => 'string|max:255',
            'description' => 'nullable|string|max:500',
            'detail' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), $validator->errors());
        }

        $validated = $validator->validated();

        $data = Post::create($validated);

        Published::dispatch($data);
        return $this->successResponse('Record created', $data, 201);
    }

}

