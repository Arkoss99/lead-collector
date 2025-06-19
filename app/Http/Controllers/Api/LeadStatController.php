<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeadStat;
use Illuminate\Http\Request;

class LeadStatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $date = $request->input('date', now()->toDateString());
        $stat = LeadStat::where('date', $date)->firstOrFail();
        return response()->json($stat);
    }
}
