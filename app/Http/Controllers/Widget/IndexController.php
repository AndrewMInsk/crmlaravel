<?php

namespace App\Http\Controllers\Widget;

use App\Http\Controllers\BaseController;

class IndexController extends BaseController
{
    public function __invoke() // тут я сделал через однометодный контроллер
    {
        return view('widget');
    }
}