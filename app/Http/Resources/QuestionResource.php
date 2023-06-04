<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'sondage_id' => $this->sondage_id,
            'QUES_LIBELLE' => $this->QUES_LIBELLE,
            'selections' => SelectionResource::collection($this->selections),
        ];
    }
}
