<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\BaseController;
use Spatie\Permission\Middleware\RoleMiddleware;

class IndexController extends BaseController // тут стандартный метод, много методов в одном контроллере
{
    public function __construct()
    {
        $this->middleware(['auth', RoleMiddleware::using('manager')]);

    }
    public function index(){
        return view('manager');
    }
}