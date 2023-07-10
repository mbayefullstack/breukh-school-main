<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'        => $this->id,
            'libelle'   => $this->libelle,
            // 'niveau'    => $this->niveaux_id
            'niveau'   => new NiveauxResource($this->whenLoaded('niveau')) 
        ];
    }
}
