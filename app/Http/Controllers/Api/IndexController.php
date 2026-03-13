<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\WidgetRequest;
use App\Http\Resources\ApiResource;

class IndexController extends BaseController
{
    public function store(WidgetRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->service->store($data);
        return new ApiResource($ticket);

    }
}