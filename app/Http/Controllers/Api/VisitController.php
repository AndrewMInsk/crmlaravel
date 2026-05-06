<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ip' => 'required|string',
            'city' => 'nullable|string',
            'device' => 'required|string',
        ]);

        Visit::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'ЗАписалось',
        ], 201);
    }
}