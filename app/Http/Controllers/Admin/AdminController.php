<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Permission\Middleware\RoleMiddleware;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(['auth', RoleMiddleware::using('manager')]);

    }
    public function index(){
        $tickets = Ticket::all();
        return view('admin.dashboard', compact('tickets'));
    }
}
