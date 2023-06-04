<?php

namespace App\Http\Controllers;

use App\Models\Sondage;
use App\Http\Resources\SondageResource;
use App\Http\Resources\VoteResource;
use App\Http\Resources\SelectionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SondageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return SondageResource::collection(Sondage::with('Questions')->get());
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    public function results(Request $request)
    {
        $idValidated = $request->validate([
            'id' => 'required|integer',
        ]);
        try {
            $votes = Sondage::with('selections.votes.user','selections.votes')->where('sondages.id', $idValidated['id'])->get();
            //return VoteResource::collection($votes);
            return $votes;
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $sondage = Sondage::create($request->all());
            return response()->json($sondage, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try{
            return new SondageResource(Sondage::with('questions.selections')->findOrFail($id));
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sondage $sondage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sondage $sondage)
    {
        //
    }
}
