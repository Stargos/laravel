<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SelectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'question_id' => $this->question_id,
            'SELEC_LIBELLE' => $this->SELEC_LIBELLE,
            'votes' => VoteResource::collection($this->votes),
        ];
    }
}
