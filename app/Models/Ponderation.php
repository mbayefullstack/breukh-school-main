<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ponderation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }
    public function anneeScolaire(): BelongsTo
    {
        return $this->belongsTo(AnneeScolaire::class);
    }
    public function semestre(): BelongsTo
    {
        return $this->belongsTo(Semestre::class);
    }
    public function evaluation(): BelongsTo
    {
        return $this->belongsTo(Evaluation::class);
    }
    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
}
