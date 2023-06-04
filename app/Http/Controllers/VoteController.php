<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Resources\SondageResource;
use App\Http\Resources\VoteResource;
use App\Http\Resources\SelectionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
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
            'user_id' => 'required|integer',
            'selection_id' => 'required|integer',
        ]);
        try {
            $vote = Vote::create($validatedRequest);
            return response()->json($vote, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => $validatedRequest], 503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
