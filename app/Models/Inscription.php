<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function eleve() :BelongsTo
    {
        return $this->belongsTo(Eleve::class);
    }

    public function anneeScolaire() :BelongsTo
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function classe() :BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
    
    
}
