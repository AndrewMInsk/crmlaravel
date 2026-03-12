<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\BaseController;

class IndexController extends BaseController// тут стандартный метод, много методов в одном контроллере
{
    public function index(){
        return view('index');
    }
}