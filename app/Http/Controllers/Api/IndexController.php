<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\WidgetRequest;
use App\Http\Resources\ApiResource;
use App\Http\Resources\ErrorResource;
use App\Models\Ticket;

class IndexController extends BaseController
{
    public function store(WidgetRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->service->store($data);
        if($ticket instanceof Ticket){
            return new ApiResource($ticket)->response()->setStatusCode(200);
        }
        else return (new ErrorResource($ticket)->response()->setStatusCode(500));

    }
}