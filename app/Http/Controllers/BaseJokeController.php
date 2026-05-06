<?php

namespace App\Http\Controllers;


use App\Services\Joke\MainJokeService;

class BaseJokeController extends Controller
{
    public function __construct(public MainJokeService $service){

    }
}
