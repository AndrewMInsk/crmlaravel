<?php

namespace App\Http\Controllers;


use App\Services\Widget\MainService;

class BaseController extends Controller
{
    public function __construct(public MainService $service){

    }
}
