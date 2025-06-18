<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Lead::query();

        if (request()->has('status')) {
            $query->where('status', request()->input('status'));
        }

        $leads = $query->paginate(15);

        return response()->json($leads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lead = Lead::create($request->all());
        return response()->json($lead);

    }

    /**
     * Display the specified resource.
     */

    // asi nefunguje probrat xdd (detail a files nejso v leadu ale jsem ztracen)
    public function show(Lead $lead)
    {
        $lead = Lead::findOrFail($lead->id);
        return response()->json($lead);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $lead->update($request->all());
        return response()->json($lead);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return response()->json(['message' => 'Lead byl smazán.']);
    }
}
