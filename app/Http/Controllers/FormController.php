<?php

namespace App\Http\Controllers;

use App\Services\Joke\JokeService;
use App\Http\Resources\JokeResource;

class FormController extends BaseJokeController
{
    public function index(JokeService $jokeService)
    {
        $jokes = $jokeService->getAllJokes();
        return JokeResource::collection($jokes);
    }
}