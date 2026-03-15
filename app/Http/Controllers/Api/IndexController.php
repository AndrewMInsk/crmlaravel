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
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)); // 30 дней назад
        $endDate = $request->input('end_date', Carbon::now()); // Текущая дата

        // Используем scope для фильтрации постов
        $tickets = Ticket::createdBetween($startDate, $endDate)->get();

        return ApiResourcesAll::collection($tickets)->response()->setStatusCode(200);

    }
}