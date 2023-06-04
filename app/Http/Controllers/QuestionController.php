<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Resources\SondageResource;
use App\Http\Resources\VoteResource;
use App\Http\Resources\SelectionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
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
            'sondage_id' => 'required|integer',
            'QUES_LIBELLE' => 'required', 'string', 'max:100',
        ]);
        try {
            $question = Question::create($validatedRequest);
            return response()->json($question, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
