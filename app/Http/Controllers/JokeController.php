<?php

namespace App\Http\Controllers;

use App\Services\Joke\JokeService;
use App\Http\Resources\JokeResource;

class JokeController extends BaseJokeController
{
    public function index(JokeService $jokeService)
    {
        $jokes = $jokeService->getAllJokes();
        return JokeResource::collection($jokes);
    }

    public function fields()
    {
        return view('jokes.fields');
    }
}
