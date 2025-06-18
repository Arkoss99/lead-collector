<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\LeadFile;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadFile = LeadFile::all();
        return response()->json($leadFile);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lead $lead)
    {
       // dd($request->file('pdf'));
        if($request->hasFile("pdf")) {
        $path = Storage::putFile(public_path('lead-documents'), $request->file('pdf'));
        LeadFile::create(["lead_id" => $lead->id, 'file_path' => $path, 'generated_at' => now()]);
        return response()->json(["file_path" => $path]);
        } else {
            return response()->json(["message" => "No file uploaded."], 400);
        }
 }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadFile $leadFile)
    {
        $leadFile->delete();
        return response()->json(["message" => "Soubor byl smazán."]);
    }
}
