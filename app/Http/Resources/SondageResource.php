<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SondageResource extends JsonResource
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
            'user_id' => $this->user_id,
            'SON_TITRE' => $this->SON_TITRE,
            'SON_DATE' => $this->SON_DATE,
            'SON_DESCRIPTION' => $this->SON_DESCRIPTION,
            'questions' => QuestionResource::collection($this->questions),
        ];
    }
}
