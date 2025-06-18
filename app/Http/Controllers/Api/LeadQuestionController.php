<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeadQuestion;
use Illuminate\Http\Request;

class LeadQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadQuestion = LeadQuestion::all();
        return response()->json($leadQuestion);
    }


    /**
     * Display the specified resource.
     */
    public function show(LeadQuestion $leadQuestion)
    {
        return response()->json($leadQuestion);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadQuestion $leadQuestion)
    {
        $leadQuestion->delete();
        return response()->json(['message' => 'Zpráva byla smazána.']);
    }
}
