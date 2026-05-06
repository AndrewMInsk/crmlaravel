<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Spatie\Permission\Middleware\RoleMiddleware;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', RoleMiddleware::using('manager')]);
    }

    public function index()
    {
        $cityData = Visit::selectRaw('city, count(*) as count')
            ->whereNotNull('city')
            ->where('city', '!=', 'Unknown')
            ->groupBy('city')
            ->get()
            ->toArray();

        $hourData = Visit::selectRaw('DATE_FORMAT(created_at, "%H:00") as hour, count(DISTINCT ip) as unique_visits')
            ->where('created_at', '>=', now()->subDay())
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->toArray();

        return view('admin.visits', [
            'cityData' => $cityData,
            'hourData' => $hourData,
        ]);
    }
}