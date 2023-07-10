<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InscriptionResource extends JsonResource
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
            'date'  => $this->date,
            'eleve' => $this->eleve,
            'anneeScolaire' => $this->anneeScolaire,
            'classe'    => $this->classe
        ];
    }
}
