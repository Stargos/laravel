<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use App\Http\Resources\SondageResource;
use App\Http\Resources\VoteResource;
use App\Http\Resources\SelectionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedRequest = $request->validate([
            'question_id' => 'required|integer',
            'SELEC_LIBELLE' => 'required', 'string', 'max:100',
        ]);
        try {
            $selection = Selection::create($validatedRequest);
            return response()->json($selection, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Selection $selection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Selection $selection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Selection $selection)
    {
        //
    }
}
