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
    public function show(LeadStat $leadStat)
    {
        $date = $leadStat->date;
        $stat = LeadStat::where('date', $date)->firstOrFail();
        return response()->json($stat);
    }
}
