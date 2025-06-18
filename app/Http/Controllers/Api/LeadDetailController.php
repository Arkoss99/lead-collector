<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeadDetail;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lead $lead)
    {
        //dd($lead);
        $details = LeadDetail::where(['lead_id' => $lead->id])->get();

        return response()->json($details);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lead $lead)
    {
        $lead->fill($request->all());
        $lead->save();
        return response()->json([
            'message' => 'LeadDetail byl Uspesne vytvoren.',
            'leadDetail' => $lead
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadDetail $leadDetail)
    {
        $leadDetail->update($request->all());
        return response()->json($leadDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadDetail $leadDetail)
    {
        $leadDetail->delete();
        return response()->json(['message' => 'LeadDetail byl smazán.']);
    }
}
