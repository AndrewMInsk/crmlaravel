<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\WidgetRequest;
use App\Http\Resources\ApiResource;
use App\Http\Resources\ApiResourcesAll;
use App\Http\Resources\ErrorResource;
use App\Models\Ticket;
use Illuminate\Support\Carbon;

class IndexController extends BaseController
{
    public const WEEK = 'week';
    public const MONTH = 'month';
    public const DAY = 'day';
    public function store(WidgetRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->service->store($data);
        if($ticket instanceof Ticket){
            return new ApiResource($ticket)->response()->setStatusCode(200);
        }
        else return (new ErrorResource($ticket)->response()->setStatusCode(500));

    }
    public function stats(BaseRequest $request)
    {
        $period = $request->input('period');

        $tickets = $this->service->dateFilter($period);


        return ApiResourcesAll::collection($tickets)->response()->setStatusCode(200);

    }
}