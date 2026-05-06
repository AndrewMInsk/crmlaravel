<?php

namespace App\Http\Controllers;

use App\Http\Requests\JokeRequest;
use Illuminate\Http\Request;

class JokeController extends BaseJokeController
{
    public function update(JokeRequest $request)
    {
        $data = $request->validated();
        $ticket = $this->service->store();
        if ($ticket instanceof Ticket) {
            return new ApiResource($ticket)->response()->setStatusCode(200);
        } else return (new ErrorResource($ticket)->response()->setStatusCode(500));

    }
}
