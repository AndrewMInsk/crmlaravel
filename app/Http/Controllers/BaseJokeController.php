<?php

namespace App\Http\Controllers;

use App\Services\Joke\JokeService;

class BaseJokeController extends Controller
{
    public function __construct(public JokeService $service){

    }
}