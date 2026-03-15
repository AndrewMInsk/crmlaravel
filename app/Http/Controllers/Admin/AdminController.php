<?php

namespace App\Http\Controllers\Admin;

use App\Http\Filters\TicketsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\BaseController;
use Spatie\Permission\Middleware\RoleMiddleware;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function __construct()
    {
        $this->middleware(['auth', RoleMiddleware::using('manager')]);

    }
    public function index(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(TicketsFilter::class, ['queryParams' => array_filter($data)]);
        $tickets = Ticket::filter($filter)->get();
        return view('admin.dashboard', compact('tickets'));
    }
}
