<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\WidgetRequest;

class IndexController extends BaseController
{
    public function store(WidgetRequest $request)
    {
        dd('store');
        $data = $request->validated();
        $saveIt = $this->service->store($data);

    }
}